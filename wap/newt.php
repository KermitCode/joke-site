<?php

/*
 *for wap list page
 */
 
require("global.php");
require(WAP_PATH."class/kermit_page_class.php");
if($pgcl && !isset($wordclass[$pgcl])) header("Location:http://wap.yozhua.com");
if(!$pgcl) $pagetitle='文字笑话-'.$webset['web_name'];

$pagedo=new Page_do;
$pagenum=20;
$start=$pagenum*($pagedo->get_thispage($pagetype='page')-1);
$i=$start+1;
$page=$pagedo->page;

$cache=false;
if($page==1 && $cache){//对列表第一页打开缓存
	cacheCheck("newt{$pgcl}.html",3600);
}

require(WAP_PATH."wap_top.php");
//分页取笑话文章
$where=$pgcl?"cl_id={$pgcl} and ":'';
if($keyword) $where.=" tt_title like '%{$keyword}%' and ";

$rs=$db_do->db_select("select SQL_CALC_FOUND_ROWS  tt_id,cl_id,tt_title,tt_showviews from xh_title where {$where} tt_visible=1 and publiced=1 order by tt_time desc limit {$start},{$pagenum}");
$allnum=$db_do->db_getone("SELECT FOUND_ROWS();");
$allnum=$allnum['FOUND_ROWS()'];
?>
<div class="dht padl5">*<?php echo $pgcl?$xhclass[$pgcl]['name']:'文字笑话'; ?></div>
<div class="dh"><?php
showWordlist($rs,$start,true,$keyword);
$keychar=$keyword?"keyword={$keyword}":'';
echo "<div class='page'>".$pagedo->showpage($allnum,$pagenum,1,"/newt-{$pgcl}-",'',$keychar)."</div>";
?></div>

<div class="cl"></div>
<div class="dht padl5">*推荐图片笑话</div>
<div class="dh"><?php showImagelist(tuijian_image(2),0);?></div>
<div class="cl"></div>

<?php
require(WAP_PATH."wap_bottom.php");
if($page==1 && $cache){//对列表第一页才写入缓存
$content=ob_get_contents();
ob_end_flush();
saveFile("newt{$pgcl}.html",$content);
}

?>