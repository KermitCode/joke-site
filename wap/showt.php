<?php

/*
 *for wap bencandy page
 */
 
require("global.php");
//取笑话文章内容
function getcontent($id){
	global $db_do;
	$rs=$db_do->db_select("select * from xh_title left join xh_title_text on xh_title_text.te_tt_id=xh_title.tt_id where tt_id='{$id}' and tt_visible=1 and publiced=1");
	$rs=$rs->fetch();
	if($rs) return $rs;
	else header("Location:index.php");
}
//返回访问量
function upcount($id){
	global $db_do;$raview=rand(1,3);
	$rs=$db_do->db_upandde("update xh_title set tt_showviews=tt_showviews+{$raview},tt_views=tt_views+1 where tt_id='{$id}'");
	}

if($pgid){//the bencandy content of a page
	$rs=getcontent($pgid);
	upcount($pgid);
}else header("Location:index.php");

$pagetitle=$rs['tt_title'].'-'.$xhclass[$rs['cl_id']]['name'].'-'.$pagetitle;
$pagekeyword=($rs['tt_keyword']=='')?$webset['web_keyword']:$rs['tt_keyword'];
$description=$pagekeyword;

require(WAP_PATH."wap_top.php");
echo "<div class='title'>{$rs['tt_title']}</div>";
echo "<div class='day'>发表:".date('Y-m-d H:i:s',$rs['tt_time'])."	阅:{$rs['tt_showviews']}次</div>";
echo "<div class='cont'>{$rs['te_text']}</div>";
echo '<div class="near">'.getUpandDownword($rs['tt_id']).'</div>';
?>
<div class="dht padl5">*推荐图片笑话</div>
<div class="dh"><?php
$i=1;
foreach(tuijian_image(2) as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newi-{$row['cl_id']}-0.html'>{$imageclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'>{$row['im_title']}</a><em> (".date('Y-m-d H:i:s',$row['im_time']).")</em><br>";
	list($width,$height,$type,$attr)=getimagesize(WAP_PATH.'/../jokeimg/'.$row['im_mainimg']);
	$widheig_char=getNewsize($width,$height);
	echo "<div class='imgs'><a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'><img src='/jokeimg/{$row['im_mainimg']}' {$widheig_char} /></a></div>";
	$i++;
	}
?></div>
<?php require(WAP_PATH."wap_bottom.php");?>