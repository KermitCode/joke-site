<?php 

/*
 *for wap index page
 */

require("global.php");
//������
$cache=true;
if($cache) cacheCheck("xhclass.html",86400);

$pagetitle='Ц������-'.$webset['web_name'];
require(WAP_PATH."wap_top.php");

?>
<div class="dht padl5">*����Ц���������</div>
<div class="dh"><?php
$i=1;
foreach($wordclass as $key=>$row){
	echo "<a href='http://wap.yozhua.com/newt-{$key}-0.html'>{$row['name']}</a>";
	if($i%3==0) echo '<br>';else echo '&nbsp;';
	$i++;
	}
?></div>
<div class="dht padl5">*ͼƬЦ���������</div>
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
if($cache){//��򿪻�������л����ļ�����
	$content=ob_get_contents();
	ob_end_flush();
	saveFile("xhclass.html",$content);
}
 ?>