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
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-user-form',
	'enableAjaxValidation'=>false,
)); 
$model->er_password='';
?>
<table id="usertab" cellspacing="0">
<tr><td colspan='2'><b>*�û������޸�</b></td></tr>
<tr><td style="width:200px;">ע���سƣ�</td><td><font color=red><b><?php echo $model->er_name;?></b></font></td></tr>
<tr><td>�û��Ա�</td><td><?php echo $form->radiobuttonlist($model,'er_sex',array('��'=>'��','Ů'=>'Ů'),array('separator'=>'&nbsp;&nbsp;')); ?></td></tr>
<tr><td>�û�QQ��</td><td>&nbsp;<?php echo $form->textField($model,'er_qq'); ?></td></tr>
<tr><td>ԭ��¼���룺</td><td>&nbsp;<?php echo $form->passwordField($model,'er_password',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?></b></td></tr>
<tr><td>�޸ĵ�¼����Ϊ��</td><td>&nbsp;<?php echo CHtml::passwordField('er_passworda','',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?>
<font color=red> �粻�޸����룬������������ռ���</font></td></tr>
<tr><td>�ظ��µ�¼���룺</td><td>&nbsp;<?php echo CHtml::passwordField('er_passwordb','',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?></td></tr>
<tr><td>��</td><td>&nbsp;&nbsp;<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : '�޸��ҵ�����'); ?></td></tr>
</table>
<?php $this->endWidget(); ?>
</div>
<div class="clear"></div>

<div class="severinput">
<span class="left"></span>
<span class="right say"></span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('���Ķ���ߵķ��������ѡ����ѡ��');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('�˺����벻��Ϊ��');return false;}document.loginform.submit();}
</script>
