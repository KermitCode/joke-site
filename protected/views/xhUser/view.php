<div><img src="<?php echo$this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">��ҳ</a> -> <a href="#">�û�����</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">��Ե*ҼЦ</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo$this->baseurl;?>images/statbot.gif" border="0"/></div>

<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="left user">
    <div class="regtit">�û����ģ�</div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/view');?>">�û�������ҳ</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/Update');?>">�����޸�</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/xiao');?>">�ҵ�Ц���б�</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/comment');?>">�ҵ������б�</a></div>
</div>

<div class="right users">
<table id="usertab" cellspacing="0"><tr>
<td colspan='4'><b>*�û�����</b></td>
</tr><tr>
<td>ע���سƣ�</td><td><b><?php echo $model->er_name;?></b></td>
<td>�û��Ա�</td><td><b><?php echo $model->er_sex;?></b></td>
</tr><tr>
<td>�û�QQ��</td><td><b><?php $model->er_qq || $model->er_qq='δ��д';echo $model->er_qq;?></b></td>
<td>ע��IP��</td><td><b><?php echo $model->er_ip;?></b></td>
</tr><tr>
<td>ע��ʱ�䣺</td><td><b><?php echo date('Y-m-d H:i:s',$model->er_gotime);?></b></td>
<td>�����¼��</td><td><b><?php echo date('Y-m-d H:i:s',$model->er_lasttime);?></b></td>
</tr><tr>
<td>�������Ц����</td><td><b><?php echo $model->er_xh_word;?></b> ƪ</td>
<td>����ͼƬЦ����</td><td><b><?php echo $model->er_xh_image;?></b> ƪ</td>
</tr><tr>
<td>�ܻ��֣�</td><td><b><font color=red><?php echo $model->er_money;?></font></b></td>
<td>�˺�״̬��</td><td><b><?php echo $model->er_status==0?'����':'����';?></b></td>
</tr></table>
</div>
<div class="clear"></div>

<div class="severinput">
<span class="left"></span>
<span class="right say"></span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('���Ķ���ߵķ��������ѡ����ѡ��');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('�˺����벻��Ϊ��');return false;}document.loginform.submit();}
</script>


