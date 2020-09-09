<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->新增修改友情链接</td></tr>
    <tr><td>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-link-form',
	'enableAjaxValidation'=>false,
)); ?>

 <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
      <tr>
        <td class="head" colspan="2"></td>
      </tr>

	<tr>
       <td class="rs"><?php echo $form->labelEx($model,'lk_title'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'lk_title',array('size'=>20,'maxlength'=>20)); ?></td>
    </tr>
	<tr>
       <td class="rs"><?php echo $form->labelEx($model,'lk_url'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'lk_url',array('size'=>50,'maxlength'=>50)); ?></td>
    </tr>
	<tr>
       <td class="rs"><?php echo $form->labelEx($model,'lk_hot'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'lk_hot',array('size'=>15,'maxlength'=>50)); ?></td>
    </tr>
	<tr>
       <td class="rs"></td>
       <td class="rs alignle"><?php echo CHtml::submitButton($model->isNewRecord ? '新增链接' : '修改链接'); ?></td>
    </tr>
 </table>

<?php $this->endWidget(); ?>
 
<!--列表结束-->

     </td></tr>
</table>