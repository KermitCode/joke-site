<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ЦЦ������̨����</title>
<link href="<?php echo Yii::app()->baseUrl;?>/images/backend/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: "����";
	font-size: 12px;
	color: #333333;
	background-color: #2286C2;}
table.menus a{color:#C33;}
table.menus a:hover{text-decoration:underline;}
-->

</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="74" colspan="2" background="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_03.gif">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="33%" rowspan="2"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_01.gif" width="253" height="74" /></td>
          <td width="6%" rowspan="2">&nbsp;</td>
          <td width="61%" height="38" align="right">
            <table width="170" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_06.gif" width="16" height="16" /></td>
                <td align="left" class="font2"><a href="#" class="font2"><strong><a href="/" target="_blank">��վǰ̨��ҳ</a></strong></a></td>
                <td align="left"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_08.gif" width="16" height="16" /></td>
                <td align="left" class="font2"><a href="<?php echo $this->createUrl('Site/Logout');?>" class="font2"><strong>�˳�</strong></a></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td align="right">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right" class="font2">��ǰ��½�û���<font color="#CC3333"><b><?php echo Yii::app()->session['admin'];?></b></font>&nbsp;|&nbsp;��ݣ�<font color=#CC3333><b><?php if(Yii::app()->session['admin']=='adminer') echo '��������Ա';
		elseif(Yii::app()->session['admin']=='admin') echo '��վ����Ա';
		else echo '��̨�����';
                ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tr>
          <td width="10%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="menus">
              <tr>
                <td width="8" height="8"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_23.gif" width="8" height="29" /></td>
                <td width="99%" background="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_24.gif"></td>
                <td width="8" height="8"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_26.gif" width="8" height="29" /></td>
              </tr>         
              <tr>
                <td background="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_45.gif"></td>
                <td bgcolor="#FFFFFF" style="padding:0 2px 0 2px; vertical-align:top;height:500px;">
                  <table width="200" border="0" cellpadding="0" cellspacing="4" class="menulist">
                   
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('Site/Control'); ?>" target="maincont">��վ����̨</a></td></tr>
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('XhErrors/index'); ?>" target="maincont">���ʾ����б�</a></td></tr>
                        
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('Xhsystem/webset'); ?>" target="maincont">��վȫ������</a></td></tr> 
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td>Ц��������</td></tr>
                   <tr><td align="center">&nbsp;</td><td>
                        <table width="100%" border="0" cellspacing="4" cellpadding="0" class="smallmenu">
                          <tr><td width="18%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td width="82%"><a href="<?php echo $this->createUrl('XhClass/index');?>" target="maincont">����б�</a></td></tr>
                          <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td><a href="<?php echo $this->createUrl('XhClass/create');?>" target="maincont">�������</a></td></tr>
                         </table></td></tr>
                        
                   <tr><td width="16%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td width="84%">����Ц������</td></tr>
                   <tr><td align="center">&nbsp;</td><td>
                        <table width="100%" border="0" cellspacing="5" cellpadding="0" class="smallmenu">
                          <tr><td width="18%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td width="82%"><a href="<?php echo $this->createUrl('XhTitle/index'); ?>" target="maincont">Ц���б�</a></td></tr>
                          <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td><a href="<?php echo $this->createUrl('XhTitle/create'); ?>" target="maincont">������Ц��</a></td></tr>
                         </table></td></tr>
                         
                   <tr><td width="16%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td width="84%">ͼƬЦ������</td></tr>
                   <tr><td align="center">&nbsp;</td><td>
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr><td width="18%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td width="82%"><a href="<?php echo $this->createUrl('XhImage/index'); ?>" target="maincont">ͼƬЦ���б�</a></td></tr>
                          <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td><a href="<?php echo $this->createUrl('XhImage/create'); ?>" target="maincont">������Цͼ</a></td></tr>
                         </table></td></tr> 
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('XhUser/index'); ?>" target="maincont">ע���û�����</a></td></tr> 
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('XhPinglun/index'); ?>" target="maincont">�û����۹���</a></td></tr> 
                        
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td>�������ӹ���</td></tr> 
                    <tr><td align="center">&nbsp;</td><td>
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr><td width="18%" align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td width="82%"><a href="<?php echo $this->createUrl('XhLink/index'); ?>" target="maincont">���������б�</a></td></tr>
                          <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_68.gif" width="11" height="14" /></td>
                              <td><a href="<?php echo $this->createUrl('XhLink/create'); ?>" target="maincont">��������</a></td></tr>
                         </table></td></tr>     
                        
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('Xhsystem/index'); ?>" target="maincont">����Ա��������</a></td></tr>
                   <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('XhSprider/table'); ?>" target="maincont">���ݱ�ṹ</a></td></tr>
                    <tr><td align="center"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_54.gif" width="15" height="11" /></td>
                        <td><a href="<?php echo $this->createUrl('XhSprider/index'); ?>" target="maincont">�����������ü�¼</a></td></tr> 
                        
                  </table>
                </td>
                <td background="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_47.gif"></td>
              </tr>
              <tr>
                <td width="8" height="8"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_91.gif" width="8" height="8" /></td>
                <td background="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_92.gif"></td>
                <td width="8" height="8"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/index1_93.gif" width="8" height="8" /></td>
              </tr>
            </table>
          </td>
          <td width="70%" valign="top"><div style="width:100%;height:540px;">
           <iframe src="<?php echo $this->createUrl('Site/Control');?>" frameborder="0" scrolling="auto" width="100%" height="100%" name="maincont"></iframe> 
          </div></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<div class="bottom">��Ȩ���С���ЦЦ����</div>
<div class="bottom1">www.33xiao.com made BY kermit 2012</div>
</body>
</html>
