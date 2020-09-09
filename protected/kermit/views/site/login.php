<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>三笑笑话网后后登录</title>
<link href="<?php echo Yii::app()->baseUrl;?>/images/backend/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{background-image:url(<?php echo Yii::app()->baseUrl;?>/images/backend/login1_08.gif);background-repeat:repeat-x;font-family: "宋体";font-size: 12px;line-height: 1.5;
	font-weight: normal;color: #546D87;background-color: #BBD9F5;margin:0 auto;text-align:center;}
.logintab{margin:0;}
form{margin:0px;padding:0px;}}
</style></head>
<body>
<script type="text/javascript">
function check(){
	if(document.getElementById('username').value==''){
		alert('用户名不得为空');
		document.getElementById('username').focus();
		return false;
		}
	if(document.getElementById('password').value==''){
		alert('密码不得为空');
		document.getElementById('password').focus();
		return false;
		}
	document.login.submit();
}
function keydown(){if(event.keyCode==13)check();}
document.onkeydown =keydown;
</script>
<form action="<?php echo $this->createUrl('Site/login'); ?>" method="post" name="login">
<table width="990" height="650" border="0" cellpadding="0" cellspacing="0" class="logintab" style="margin:0 auto;">
  <tr><td width="318" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
          <td height="299" align="right"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_01.gif" width="318" height="299" /></td>
        </tr><tr>
          <td height="351" align="right"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_04.gif" width="318" height="351" /></td>
        </tr>
      </table>
    </td>
    <td width="366" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="299" background="<?php echo Yii::app()->baseUrl;?>/images/backend/login_6.gif"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_02.gif" width="366" height="299" /></td>
        </tr>
        <tr>
          <td height="96" valign="top" background="<?php echo Yii::app()->baseUrl;?>/images/backend/login_9.gif">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%" height="25">&nbsp;</td>
                <td width="48%" valign="top">
                  <label>
                  <input name="username" id="username" type="text" class="txt" size="25" value="admin" />
                  </label>
                </td>
                <td width="27%" rowspan="2" style="text-align:left;"><a onclick="javascript:check();" style="margin:0px;padding:0px;"><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login_2.gif" width="57" height="55" border=0 /></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <input name="password" id="password" type="password" class="txt" size="25"  />
                </td>
              </tr>
              <tr>
                <td height="36">&nbsp;</td>
                <td><img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login_3.gif" width="77" height="25" border="0" />&nbsp;<img src="<?php echo Yii::app()->baseUrl;?>/images/backend/login_4.gif" width="77" height="25" border="0" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="255" background="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_07.gif">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="129">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">版权所有 &copy; <a href="http://www.mycodes.net">www.33xiao.com</a> </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td width="318" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="299" align="left" background="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_03.gif">&nbsp;</td>
        </tr>
        <tr>
          <td height="351" align="left" background="<?php echo Yii::app()->baseUrl;?>/images/backend/login1_06.gif">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table> </form>
</body>
</html>
