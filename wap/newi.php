<?php

/*
 *for wap list page
 */
 
require("global.php");
require(WAP_PATH."class/kermit_page_class.php");
if($pgcl && !isset($imageclass[$pgcl])) header("Location:http://wap.yozhua.com");
if(!$pgcl) $pagetitle='图片笑话-'.$webset['web_name'];

$pagedo=new Page_do;
$pagenum=8;
$start=$pagenum*($pagedo->get_thispage($pagetype='page')-1);
$i=$start+1;
$page=$pagedo->page;

$cache=false;
if($page==1 && $cache){//对列表第一页打开缓存
	cacheCheck("list{$pgcl}.html",$webset['wap_cache_time']);
}else ob_end_flush();

require(WAP_PATH."wap_top.php");

//分页取笑话文章
$where=$pgcl?"cl_id={$pgcl} and ":'';
if($keyword) $where.=" im_title like '%{$keyword}%' and ";

$rs=$db_do->db_select("select SQL_CALC_FOUND_ROWS  im_id,cl_id,im_title,im_mainimg,im_showviews,im_time from xh_image where {$where} im_visible=1 and publiced=1 order by im_time desc limit {$start},{$pagenum}");
$allnum=$db_do->db_getone("SELECT FOUND_ROWS();");
$allnum=$allnum['FOUND_ROWS()'];
?>

<div class="dht padl5">*<?php echo $pgcl?$xhclass[$pgcl]['name']:'图片笑话'; ?></div>
<div class="dh"><?php
showImagelist($rs,$start,true,$keyword);
$keychar=$keyword?"keyword={$keyword}":'';
echo "<div class='page'>".$pagedo->showpage($allnum,$pagenum,1,"/newi-{$pgcl}-",'',$keychar)."</div>";
?></div>

<div class="cl"></div>
<div class="dht padl5">*推荐文字笑话</div>
<div class="dh"><?php showWordlist(tuijian_word(),0); ?></div>
<div class="cl"></div>

<?php
require(WAP_PATH."wap_bottom.php");
if($page==1 && $cache){//对列表第一页才写入缓存
$content=ob_get_contents();
ob_end_flush();
saveFile("newt{$pgcl}.html",$content);
}

?>