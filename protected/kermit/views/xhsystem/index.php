<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->����Ա��������</td></tr>
    <tr><td>

<!--�б�ʼ-->
	 <form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'super'));?>" method="post">     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">��������Ա���룺��¼�˺� <font color=red>admin</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">��������Աԭ���룺</td>
            <td class="rs alignle"><input type="password" name="super1" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">��������Ա�����룺</td>
            <td class="rs alignle"><input type="password" name="super2" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">�ظ��������������룺</td>
            <td class="rs alignle"><input type="password" name="super3" /></td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="ȷ���޸ĳ�������" /></td>
          </tr>
     </table></form> 
<!--�б����-->
<br />
<!--�б�ʼ--> 
	<form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'normal'));?>" method="post">     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="3">��ͨ����Ա���룺��¼�˺� <font color=red>admin</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">������ͨ����Ա��¼���룺</td>
            <td class="rs alignle"><input type="password" name="normal" /></td>
          </tr>
           <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="�޸���ͨ��������" /></td>
          </tr>
     </table></form>  
<!--�б����-->
<br />
<!--�б�ʼ-->  
	<form action="<?php echo $this->createUrl('Xhsystem/modify',array('type'=>'test'));?>" method="post">   
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="3">��̨����ߵ�¼���룺��¼�˺� <font color=red>test</font></td><td></td></tr>
          <tr>
          	<td class="rs" width="25%">���ú�̨����û���¼���룺</td>
            <td class="rs alignle"><input type="password" name="test" /></td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="�޸ĺ�̨����û�����" /></td>
          </tr>
     </table></form> 
<!--�б����-->

     </td></tr>
</table>