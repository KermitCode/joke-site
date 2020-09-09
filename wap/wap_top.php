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
<tr><td class="zhici">哟爪笑话网·一笑倾城 二笑倾国 三笑倾我笑神经</td></tr>
</table></div>
<div class="padl5 padb5 dhtop">
<a href="http://wap.yozhua.com/index.html">本站首页</a>&nbsp;
<a href="http://wap.yozhua.com/newt.html">文字笑话</a>&nbsp;
<a href="http://wap.yozhua.com/bestt.html">精华文字笑话</a>&nbsp;<br />
<a href="http://wap.yozhua.com/xhclass.html">全部分类</a>&nbsp;
<a href="http://wap.yozhua.com/newi.html">图片笑话</a>&nbsp;
<a href="http://wap.yozhua.com/besti.html">精华图片笑话</a>&nbsp;<br />
</div>
<div class="cen"><?php echo $webset['ad_web_navtop'];?></div>
<div class="near"><?php
$stat=require(WAP_PATH."../protected/coreData/stat.php");
echo "总笑话数:文字笑话<b>{$stat['allw']}</b>篇,图片笑话<b>{$stat['alli']}</b>篇<br>";
echo "今日更新:文字笑话<b>{$stat['dayw']}</b>篇,图片笑话<b>{$stat['dayi']}</b>篇";
?></div>
<div class="near"><form action="http://wap.yozhua.com/newt.html" method="get">搜索:<input type="text" name="keyword" id="keyword" value="<?php echo $_SESSION['keyword'];?>" size="10" />
&nbsp;<input type="submit" value="搜文字" />
&nbsp;<input type="button" value="搜图片" onclick="javascript:window.location.href='http://wap.yozhua.com/newi.html?keyword='+document.getElementById('keyword').value;";/></form></div>