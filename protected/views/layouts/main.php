<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="keywords" content="<?php echo $this->page_keyword;?>" />
<meta name="description" content="<?php echo $this->page_description;?>" />
<title><?php echo $this->page_title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/alluse.css" />
</head>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>images/jquery_17min.js"></script>
<script type="text/javascript">var basepath='<?php echo $this->baseurl;?>';var username="<?php echo Yii::app()->session['er_name'];?>";var plrig=<?php echo $this->webset['pingjia_right'];?>;</script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>images/weball.js" defer="defer"></script>
<script type="text/javascript">var imgtime=<?php echo $this->webset['image_seconds']*1000;?>;var imgautos;var playcook=Number(GetCookie('playcook'));</script>

<body>
<a name="top"></a>
<!--top_start-->
<div id="top"><p id="toptb">
	<span class="left"><a href="<?php echo $this->webset['web_url'];?>">04007Ц��</a>��һЦ��� ��Ц��� ��Ц����Ц��...</span>
	<span class="right"><?php if(Yii::app()->session['er_name']==''){?><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhUser/login');?>">��¼��ע��</a><?php }
	else echo "<b><font color=red>���� ".Yii::app()->session['er_name']." <a href='".$this->webset['web_url'].$this->createUrl('XhUser/logout')."'>�˳�</a></font></b>&nbsp;|&nbsp;<a href='".$this->createUrl('xhUser/view')."'>�û�����</a>";?>&nbsp;|&nbsp;<a href="http://joke.04007.cn/wap">�ֻ���</a>&nbsp;|&nbsp;<a href="javascript:void(0);" id="keep">�ղر�վ</a>&nbsp;|&nbsp;<a href="#" onclick="javascript:alert('����ϵ���䣺2539648623@qq.com');return false;" target="_blank" >��վ����</a>&nbsp;|&nbsp;Ц�����������</span>
</p></div>
<div id="header">
    <div class="logo">
		<a href="<?php echo $this->webset['web_url'];?>" title="Ц����" style="font-size:40px;font-weight:bolder;color:#ccc;">
			<!--<img width="180" height="60" src="<?php echo $this->baseurl; ?>images/logo.gif" alt="ӴצЦ����"/>-->
			04007Ц��
		</a>
	</div>
    <div id="ad1"><?php echo stripslashes($this->webset['ad_web_navtop']);?></div> 
    <div id="search_box"> 
    <form id="search_form" method="post" action="<?php echo $this->createUrl('XhTitle/Search');?>"> 
    <select name="class" id="class">
    <option value="1">����</option>
    <option value="2" <?php if(isset($this->sec_class)) echo 'selected';?>>ͼƬ</option></select>
    <input type="text" id="s" name="keyword" value="<?php if(isset($this->keyword) && $this->keyword!='') echo $this->keyword ;else echo '������ؼ���';?>" class="swap_value" />
    <input type="hidden" value="<?php echo $this->createUrl('XhImage/Search');?>" id="imgurl" />
    <input type="image" src="<?php echo $this->baseurl; ?>images/search_but.gif" width="27" height="24" id="go" alt="Search" title="Search" /> 
    </form> 
    </div>
</div>
<div id="menu">
<ul id="button">
    <li><a href="<?php echo $this->webset['web_url'];?>" <?php echo $this->thispage[0];?>><h1>��վ��ҳ</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhClass/index');?>" <?php echo $this->thispage[1];?>><h1>Ц������</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/index');?>" <?php echo $this->thispage[2];?>><h1>����Ц��</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/best');?>" <?php echo $this->thispage[3];?>><h1>��Ц����</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhImage/index');?>" <?php echo $this->thispage[4];?>><h1>ͼƬЦ��</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhImage/best');?>" <?php echo $this->thispage[5];?>><h1>��ЦͼƬ</h1></a></li> 
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/Sort');?>" <?php echo $this->thispage[6];?>><h1>Ц������</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhClass/Myxiao');?>" <?php echo $this->thispage[7];?>><h1>����ԭ��</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/create');?>" <?php echo $this->thispage[8];?>><h1>��Ҫ����</h1></a></li>
    <li><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhUser/view');?>" <?php echo $this->thispage[9];?>><h1>�û�����</h1></a></li>
</ul>
<div class="clear"></div>
</div> 
<!--top_end-->

<div id="main_cont">
<!-- contentstart -->
<?php echo $content; ?>
<!-- contentend -->
<div class="clear"></div>
</div>

<div class="clear"></div>

<div id="links">
<div id="footline"><a href="<?php echo $this->webset['web_url'];?>">04007Ц��</a>��һЦ��ǡ���Ц�������Ц����Ц��&nbsp;&nbsp;&nbsp;&nbsp;Ц�����������</div>
<div class="linkt"><a><b>�������ӣ�</b></a><?php 
$link=require(Yii::app()->basePath.'/coreData/friend_link.php');
if($link){
	foreach($link as $key=>$value){
		echo "<a href='{$value['url']}' target='_blank'>{$value['title']}</a>";		
		}
}
?></div>
</div>
<?php  echo stripslashes($this->webset['ad_web_tanchuang']);//ȫվ������棺
		echo stripslashes($this->webset['ad_web_duilian']);//ȫվ�������?>
        
<!-- webbottom -->
<div id="foot">
<div id="music"><audio  src="/images/music.wav" autostart="false" id="yuanmusic"  width="0" height="0"></audio></div>
<div id="footer">
<p>
    <span class="left">��ַ���й�ɽ��ʡ���ൺ�� ��Ϣ��ҵ�����ţ�<?php echo $this->webset['web_beian']?></span>
    <span class="right"> Copyright <span style="font-size:12px;font-family:Arial, Helvetica, sans-serif;" >&copy;</span> by <?php echo $this->webset['web_url'];?> 2012 - 2022 All Rights Reserved</span></p>
<p>
    <span class="left">��վͳ�� <?php echo stripslashes($this->webset['web_stat']);?>   ����QQ�������������İ�������</span>
    <span class="right">�籾վ�������ַ�������Ȩ�� �뼰ʱ���ʼ���ʽ֪ͨ���� ���ǽ�����˶Դ���!</span></p>
</div></div>
<!-- webbottomend -->

</body>
</html>