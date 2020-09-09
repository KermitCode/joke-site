<?php

/*
 *for wap bencandy page
 */
 
require("global.php");
//取笑话文章内容
function getcontent($id){
	global $db_do;
	$rs=$db_do->db_select("select * from xh_image where im_id='{$id}' and im_visible=1 and publiced=1");
	$rs=$rs->fetch();
	if($rs) return $rs;
	else header("Location:index.php");
}
//返回访问量
function upcount($id){
	global $db_do;$raview=rand(1,3);
	$rs=$db_do->db_upandde("update xh_image set im_showviews=im_showviews+{$raview},im_views=im_views+1 where im_id='{$id}'");
	}

if($pgid){//the bencandy content of a page
	$rs=getcontent($pgid);
	upcount($pgid);
}else header("Location:index.php");

$pagetitle=$rs['im_title'].'-'.$xhclass[$rs['cl_id']]['name'].'-'.$pagetitle;
$pagekeyword=$rs['im_title'].','.$xhclass[$rs['cl_id']]['name'];
$description=$pagekeyword;

require(WAP_PATH."wap_top.php");
echo "<div class='title'>{$rs['im_title']}</div>";
echo "<div class='day'>发表:".date('Y-m-d H:i:s',$rs['im_time'])."	阅:{$rs['im_showviews']}次</div>";
$url_arr=mb_unserialize($rs['img_urls']);
$i=1;
echo "<div class='near'>".getUpandDownimage($rs['im_id'])."</div>";
foreach($url_arr as $key=>$row){
		echo "{$i}. {$row[0]}<br>";
		list($width,$height,$type,$attr)=getimagesize(WAP_PATH.'/../jokeimg/'.$row[1]);
		$widheig_char=getNewsize($width,$height);
		echo "<div class='imgs'><img src='/jokeimg/{$row[1]}' {$widheig_char} /></div>";
		$i++;
	}	
?>
<div class="dht padl5">*推荐文字笑话</div>
<div class="dh"><?php
$i=1;
foreach(tuijian_word(10) as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newt-{$row['cl_id']}-0.html'>{$wordclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showt-{$row['tt_id']}.html'>{$row['tt_title']}</a><em> (".date('m-d',$row['tt_time']).")</em><br>";
	$i++;
	}
?></div>
<?php require(WAP_PATH."wap_bottom.php");?>