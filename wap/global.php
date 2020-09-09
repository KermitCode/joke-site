<?php

/**
 **the all use of the wap page
 */

define('WAP_PATH', dirname(__FILE__).'/');
date_default_timezone_set("PRC");
session_start();
$_SESSION['keyword']=isset($_SESSION['keyword'])?$_SESSION['keyword']:'';
$keyword='';
if(isset($_GET['keyword']) && $keyword=trim($_GET['keyword'])){
	$_SESSION['keyword']=$keyword;
}elseif($_SESSION['keyword']!='') $keyword=$_SESSION['keyword'];
else;

//make db class
defined('YII_DEBUG') or define('YII_DEBUG',false);
$db_array= require(WAP_PATH."../protected/coreData/db.php");
require(WAP_PATH."class/kermit_db_class.php");
$db_do=new db_do($db_array);

//help function
require(WAP_PATH."../protected/class/kermitBase.php");
$kermitBase=new kermitBase();

//require data
$webset=require(WAP_PATH."../protected/coreData/webset.php");
$xhclass=require(WAP_PATH."../protected/coreData/xhclass.php");
$stat=require(WAP_PATH."../protected/coreData/stat.php");
$basedata=require(WAP_PATH."../protected/coreData/stat.php");

$class_array=explode('=',$webset['index_class_arr']);
if(!$webset['web_open']) exit($webset['web_close_words']);

//get rand showclass
$wordclass=$imageclass=array();
foreach($xhclass as $key=>$row){
    if($row['type']==1) $wordclass[$key]=$row;
    else $imageclass[$key]=$row;
}

//get data
$pgcl=isset($_GET['pgcl'])?intval($_GET['pgcl']):0;
$pgid=isset($_GET['pgid'])?intval($_GET['pgid']):0;
$pagetitle=isset($xhclass[$pgcl])?($xhclass[$pgcl]['name'].'-'.$webset['web_name']):$webset['web_name'];
$pagekeyword=isset($xhclass[$pgcl])?($xhclass[$pgcl]['name'].','.$webset['web_name']):$webset['web_keyword'];
$description=$webset['web_description'];

//取最新文字笑话数据
function getlist_word($rows=9){
	global $db_do;
	$rs=$db_do->db_select("select tt_id,cl_id,tt_title,tt_showviews,tt_time from xh_title where tt_visible=1 and publiced=1 order by tt_time desc limit 0,{$rows}");
	return $rs;
}
//取最新图片笑话数据
function getlist_image($rows=5){//取最新文字笑话
	global $db_do;
	$rs=$db_do->db_select("select im_id,cl_id,im_title,im_mainimg,im_showviews,im_time from xh_image where im_visible=1 and publiced=1 order by im_time desc limit 0,{$rows}");
	return $rs;
}
//取推荐文字笑话数据
function tuijian_word($rows=15){
	global $db_do;
	$rs=$db_do->db_select("select tt_id,cl_id,tt_title,tt_showviews,tt_time from xh_title where tt_visible=1 and publiced=1 order by tt_voters_up desc limit 0,{$rows}");
	return $rs;
}
//取推荐文字笑话数据
function tuijian_image($rows=3){
	global $db_do;
	$rs=$db_do->db_select("select im_id,cl_id,im_title,im_mainimg,im_showviews,im_time from xh_image where im_visible=1 and publiced=1 order by im_voters_up desc limit 0,{$rows}");
	return $rs;
}
//重置图片高宽度
function getNewsize($width,$height){
	if(!$width || !$height) return '';
	$maxwidth=200;
	if($width<=$maxwidth) return "width='{$width}' height='{$height}'";
	$newwidth=$maxwidth;
	$newheight=intval(($maxwidth/$width)*$height);
	return "width='{$newwidth}' height='{$newheight}'";
	}
//显示文字笑话
function showWordlist($rs,$start,$new=true,$keyword=''){
	$i=$start+1;
	global $wordclass;
	$gopage=$new?'newt':'bestt';
	foreach($rs as $key=>$row){
		if($keyword) $row['tt_title']=str_ireplace($keyword,"<font color=red>{$keyword}</font>",$row['tt_title']);
		echo "{$i}. [<a href='http://wap.yozhua.com/{$gopage}-{$row['cl_id']}-0.html'>{$wordclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showt-{$row['tt_id']}.html'>{$row['tt_title']}</a><em> ({$row['tt_showviews']})</em><br>";
		$i++;
		}
}
//显示图片笑话
function showImagelist($rs,$start,$new=true,$keyword=''){
	$i=$start+1;
	global $imageclass;
	$gopage=$new?'newi':'besti';
	foreach($rs as $key=>$row){
		if($keyword) $row['im_title']=str_ireplace($keyword,"<font color=red>{$keyword}</font>",$row['im_title']);
		echo "{$i}. [<a href='http://wap.yozhua.com/{$gopage}-{$row['cl_id']}-0.html'>{$imageclass[$row['cl_id']]['name']}</a>] <a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'>{$row['im_title']}</a><em> ({$row['im_showviews']})</em><br>";
		list($width,$height,$type,$attr)=getimagesize(WAP_PATH.'/../jokeimg/'.$row['im_mainimg']);
		$widheig_char=getNewsize($width,$height);
		echo "<div class='imgs'><a href='http://wap.yozhua.com/showi-{$row['im_id']}.html'><img src='/jokeimg/{$row['im_mainimg']}' {$widheig_char} /></a></div>";
		$i++;
	}	
}
//图片解url
function mb_unserialize($serial_str){
	$out =preg_replace('/s:(\d+):"(.*?)";/se', "'s:'.strlen('$2').':\"$2\";'",$serial_str); 
	return unserialize ($out); 
}
//取上一篇和下一篇文字笑话
function getUpandDownword($id){
		global $db_do;
		$next=$db_do->db_select("select tt_id,tt_title from xh_title where publiced=1 and tt_visible=1 and tt_id>{$id} order by tt_id asc limit 1")->fetch();							
        $pre=$db_do->db_select("select tt_id,tt_title from xh_title where publiced=1 and tt_visible=1 and tt_id<{$id} order by tt_id desc limit 1")->fetch();															
        if(!empty($pre)){
			$return_char="上一篇:<a href='http://wap.yozhua.com/showt-".$pre['tt_id'].".html'>".$pre['tt_title']."</a><br>";
		}else $return_char="上一篇:已经没有了...<br>";
        if(!empty($next)){
			$return_char.="下一篇:<a href='http://wap.yozhua.com/showt-".$next['tt_id'].".html'>".$next['tt_title']."</a><br>";
		}else $return_char.="下一篇:最后一篇了...";
		return $return_char;
	}
//取上一篇和下一篇图片知话
function getUpandDownimage($id){
		global $db_do;
		$next_image=$db_do->db_select("select im_id,im_title from xh_image where publiced=1 and  im_visible=1 and im_id>{$id} order by im_id asc limit 1")->fetch();										
        $pre_image=$db_do->db_select("select im_id,im_title from xh_image where publiced=1 and  im_visible=1 and im_id<{$id} order by im_id desc limit 1")->fetch();
        if(!empty($pre_image)){
			$return_char="上一篇：<a href='http://wap.yozhua.com/showi-".$pre_image['im_id'].".html'>".$pre_image['im_title']."</a><br>";
		}else $return_char="上一篇：已经没有了...<br>";
        if(!empty($next_image)){
			$return_char.="下一篇：<a href='http://wap.yozhua.com/showi-".$next_image['im_id'].".html'>".$next_image['im_title']."</a><br>";
		}else $return_char.="下一篇：最后一篇了...";
		return $return_char;
	}
//缓存检查
function cacheCheck($cache_file,$cache_time=7200){//检查缓存时间
   $cache_file="cache/".$cache_file;
   $cache_time<1 && $cache_time=7200;
   if(file_exists($cache_file)){
   		$cTime=intval(filemtime($cache_file));
   		if($cTime+$cache_time>time()){
   			echo file_get_contents($cache_file);
   			ob_end_flush();exit;}
   	}
   return false;
}
//保存缓存文件
function saveFile($filename,$text){//写入缓存内容
   $filename="cache/".$filename;
   if(!$filename || !$text) return false;
   	$fp = fopen($filename,"wb");
   	@fwrite($fp,$text);
	fclose($fp);
}

?>