<?php

/*
 *for wap list page
 */
 
require("global.php");
$_SESSION['keyword']=$keyword='';

require(WAP_PATH."class/kermit_page_class.php");
if($pgcl && !isset($wordclass[$pgcl])) header("Location:http://wap.yozhua.com");
if(!$pgcl) $pagetitle='��������Ц��-'.$webset['web_name'];
else $pagetitle='����'.$xhclass[$pgcl]['name'].'-'.$webset['web_name'];
$pagedo=new Page_do;
$pagenum=20;
$start=$pagenum*($pagedo->get_thispage($pagetype='page')-1);
$i=$start+1;
$page=$pagedo->page;

//���洦��
$cache=false;
if($page==1 && $cache){//���б��һҳ�򿪻���
	cacheCheck("bestt{$pgcl}.html",3600);
}

require(WAP_PATH."wap_top.php");

//��ҳȡЦ������
$where=$pgcl?"cl_id={$pgcl} and ":'';
$rs=$db_do->db_select("select SQL_CALC_FOUND_ROWS  tt_id,cl_id,tt_title,tt_showviews from xh_title where tt_best=1 and {$where} tt_visible=1 and publiced=1 order by tt_time desc limit {$start},{$pagenum}");
$allnum=$db_do->db_getone("SELECT FOUND_ROWS();");
$allnum=$allnum['FOUND_ROWS()'];
?>
<div class="dht padl5">*<?php echo $pgcl?('����'.$xhclass[$pgcl]['name']):'��������Ц��'; ?></div>
<div class="dh"><?php
showWordlist($rs,$start,false);
echo "<div class='page'>".$pagedo->showpage($allnum,$pagenum,1,"/bestt-{$pgcl}-")."</div>";
?></div>

<div class="cl"></div>
<div class="dht padl5">*�Ƽ�ͼƬЦ��</div>
<div class="dh"><?php showImagelist(tuijian_image(2),0);?></div>
<div class="cl"></div>

<?php

require(WAP_PATH."wap_bottom.php");
if($page==1 && $cache){//���б��һҳ��д�뻺��
$content=ob_get_contents();
ob_end_flush();
saveFile("bestt{$pgcl}.html",$content);
}

?>