<?php

/*
 *for wap index page
 */

require("global.php");
$_SESSION['keyword']=$keyword='';
$cache=true;

//��ҳ������
if($cache) cacheCheck("wap.html",3600);
require(WAP_PATH."wap_top.php");
?>
<div class="dht">
    <div class="padl5">*��������Ц��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://wap.yozhua.com/newt.html">����>></a></div>
</div>
<div class="dh"><?php
$i=1;
foreach(getlist_word() as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newt-{$row['cl_id']}-0.html'>{$wordclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showt-{$row['tt_id']}.html'>{$row['tt_title']}</a><em> (".date('m-d',$row['tt_time']).")</em><br>";
	$i++;
	}
?></div>
<div class="dht">
    <div class="padl5">*����ͼƬЦ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://wap.yozhua.com/newi.html">����>></a></div>
</div>
<div class="dh"><?php
$i=1;
foreach(getlist_image() as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newi-{$row['cl_id']}-0.html'>{$imageclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'>{$row['im_title']}</a><em> (".date('Y-m-d H:i:s',$row['im_time']).")</em><br>";
	list($width,$height,$type,$attr)=getimagesize(WAP_PATH.'/../jokeimg/'.$row['im_mainimg']);
	$widheig_char=getNewsize($width,$height);
	echo "<div class='imgs'><a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'><img src='/jokeimg/{$row['im_mainimg']}' {$widheig_char} /></a></div>";
	$i++;
	}
?></div>
<div class="dht padl5">*�Ƽ�����Ц��</div>
<div class="dh"><?php
$i=1;
foreach(tuijian_word() as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newt-{$row['cl_id']}-0.html'>{$wordclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showt-{$row['tt_id']}.html'>{$row['tt_title']}</a><em> (".date('m-d',$row['tt_time']).")</em><br>";
	$i++;
	}
?></div>
<div class="cl"></div>
<div class="dht padl5">*�Ƽ�ͼƬЦ��</div>
<div class="dh"><?php
$i=1;
foreach(tuijian_image() as $key=>$row){
	echo "{$i}. [<a href='http://wap.yozhua.com/newi-{$row['cl_id']}-0.html'>{$imageclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'>{$row['im_title']}</a><em> (".date('Y-m-d H:i:s',$row['im_time']).")</em><br>";
	list($width,$height,$type,$attr)=getimagesize(WAP_PATH.'/../jokeimg/'.$row['im_mainimg']);
	$widheig_char=getNewsize($width,$height);
	echo "<div class='imgs'><a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'><img src='/jokeimg/{$row['im_mainimg']}' {$widheig_char} /></a></div>";
	$i++;
	}
?></div>
<div class="cl"></div>

<?php
require(WAP_PATH."wap_bottom.php");
if($cache){//��򿪻�������л����ļ�����
	$content=ob_get_contents();
	ob_end_flush();
	saveFile("index.html",$content);
}

?>