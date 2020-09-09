<?php 

/*
 *for wap index page
 */

require("global.php");
//缓存检查
$cache=true;
if($cache) cacheCheck("xhclass.html",86400);

$pagetitle='笑话分类-'.$webset['web_name'];
require(WAP_PATH."wap_top.php");

?>
<div class="dht padl5">*文字笑话所有类别</div>
<div class="dh"><?php
$i=1;
foreach($wordclass as $key=>$row){
	echo "<a href='http://wap.yozhua.com/newt-{$key}-0.html'>{$row['name']}</a>";
	if($i%3==0) echo '<br>';else echo '&nbsp;';
	$i++;
	}
?></div>
<div class="dht padl5">*图片笑话所有类别</div>
<div class="dh"><?php
$i=1;
foreach($imageclass as $key=>$row){
	echo "<a href='http://wap.yozhua.com/newi-{$key}-0.html'>{$row['name']}</a>";
	if($i%3==0) echo '<br>';else echo '&nbsp;';
	$i++;
	}
?></div>
<div class="cl"></div>
<?php 
require(WAP_PATH."wap_bottom.php");
if($cache){//如打开缓存则进行缓存文件保存
	$content=ob_get_contents();
	ob_end_flush();
	saveFile("xhclass.html",$content);
}
 ?>