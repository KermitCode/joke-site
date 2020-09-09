<div><img src="<?php echo$this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="#">用户中心</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo$this->baseurl;?>images/statbot.gif" border="0"/></div>

<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="left user">
    <div class="regtit">用户中心：</div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/view');?>">用户中心首页</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/Update');?>">资料修改</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/xiao');?>">我的笑话列表</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/comment');?>">我的评论列表</a></div>
</div>

<div class="right users">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-user-form',
	'enableAjaxValidation'=>false,
)); 
$model->er_password='';
?>
<table id="usertab" cellspacing="0">
<tr><td colspan='2'><b>*用户资料修改</b></td></tr>
<tr><td style="width:200px;">注册呢称：</td><td><font color=red><b><?php echo $model->er_name;?></b></font></td></tr>
<tr><td>用户性别：</td><td><?php echo $form->radiobuttonlist($model,'er_sex',array('男'=>'男','女'=>'女'),array('separator'=>'&nbsp;&nbsp;')); ?></td></tr>
<tr><td>用户QQ：</td><td>&nbsp;<?php echo $form->textField($model,'er_qq'); ?></td></tr>
<tr><td>原登录密码：</td><td>&nbsp;<?php echo $form->passwordField($model,'er_password',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?></b></td></tr>
<tr><td>修改登录密码为：</td><td>&nbsp;<?php echo CHtml::passwordField('er_passworda','',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?>
<font color=red> 如不修改密码，此项及以下项留空即可</font></td></tr>
<tr><td>重复新登录密码：</td><td>&nbsp;<?php echo CHtml::passwordField('er_passwordb','',array('size'=>20,'maxlength'=>32,'class'=>'pass')); ?></td></tr>
<tr><td>　</td><td>&nbsp;&nbsp;<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : '修改我的资料'); ?></td></tr>
</table>
<?php $this->endWidget(); ?>
</div>
<div class="clear"></div>

<div class="severinput">
<span class="left"></span>
<span class="right say"></span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('请阅读左边的服务条款并勾选左下选框');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('账号密码不得为空');return false;}document.loginform.submit();}
</script>
