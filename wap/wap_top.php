<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="MobileOptimized" content="240"/>
<meta name="viewport" content="width=device-width,initial-scale=1.33,minimum-scale=1.0,maximum-scale=1.0"/>
<meta name="keywords" content="<?php echo $pagekeyword;?>" />
<meta name="description" content="<?php echo $description;?>" />
<title><?php echo $pagetitle;?></title>
<link rel="stylesheet" type="text/css" href="/wap/wap.css" media="all" />
</head>
<body>
<div><a name="top"></a>
<table>
<td><img src="/images/logo.gif" class="logo" width="180" height="60" /></td></tr>
<tr><td class="zhici">ӴצЦ������һЦ��� ��Ц��� ��Ц����Ц��</td></tr>
</table></div>
<div class="padl5 padb5 dhtop">
<a href="http://wap.yozhua.com/index.html">��վ��ҳ</a>&nbsp;
<a href="http://wap.yozhua.com/newt.html">����Ц��</a>&nbsp;
<a href="http://wap.yozhua.com/bestt.html">��������Ц��</a>&nbsp;<br />
<a href="http://wap.yozhua.com/xhclass.html">ȫ������</a>&nbsp;
<a href="http://wap.yozhua.com/newi.html">ͼƬЦ��</a>&nbsp;
<a href="http://wap.yozhua.com/besti.html">����ͼƬЦ��</a>&nbsp;<br />
</div>
<div class="cen"><?php echo $webset['ad_web_navtop'];?></div>
<div class="near"><?php
$stat=require(WAP_PATH."../protected/coreData/stat.php");
echo "��Ц����:����Ц��<b>{$stat['allw']}</b>ƪ,ͼƬЦ��<b>{$stat['alli']}</b>ƪ<br>";
echo "���ո���:����Ц��<b>{$stat['dayw']}</b>ƪ,ͼƬЦ��<b>{$stat['dayi']}</b>ƪ";
?></div>
<div class="near"><form action="http://wap.yozhua.com/newt.html" method="get">����:<input type="text" name="keyword" id="keyword" value="<?php echo $_SESSION['keyword'];?>" size="10" />
&nbsp;<input type="submit" value="������" />
&nbsp;<input type="button" value="��ͼƬ" onclick="javascript:window.location.href='http://wap.yozhua.com/newi.html?keyword='+document.getElementById('keyword').value;";/></form></div>