<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->管理员口令设置</td></tr>
    <tr><td>

<!--列表开始-->
	 <form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'super'));?>" method="post">     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">超级管理员密码：登录账号 <font color=red>admin</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">超级管理员原密码：</td>
            <td class="rs alignle"><input type="password" name="super1" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">超级管理员新密码：</td>
            <td class="rs alignle"><input type="password" name="super2" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">重复超级管理新密码：</td>
            <td class="rs alignle"><input type="password" name="super3" /></td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="确定修改超级密码" /></td>
          </tr>
     </table></form> 
<!--列表结束-->
<br />
<!--列表开始--> 
	<form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'normal'));?>" method="post">     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="3">普通管理员密码：登录账号 <font color=red>admin</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">设置普通管理员登录密码：</td>
            <td class="rs alignle"><input type="password" name="normal" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="修改普通管理密码" /></td>
          </tr>
     </table></form>  
<!--列表结束-->
<br />
<!--列表开始-->  
	<form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'test'));?>" method="post">   
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="3">后台浏览者登录密码：登录账号 <font color=red>test</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">设置后台浏览用户登录密码：</td>
            <td class="rs alignle"><input type="password" name="test" /></td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="修改后台浏览用户密码" /></td>
          </tr>
     </table></form> 
<!--列表结束-->

     </td></tr>
</table>