<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->Ц����������޸�</td></tr>
    <tr><td>
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-class-form',
	'enableAjaxValidation'=>false,
)); ?>
 <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
      <tr>
        <td class="head" colspan="2"></td>
      </tr>

	<tr>
       <td class="rs">������ƣ�</td>
       <td class="rs alignle"><?php echo $form->textField($model,'cl_name',array('size'=>20,'maxlength'=>50)); ?>
       <?php echo $form->error($model,'cl_name'); ?></td>
    </tr>
    <tr>
       <td class="rs">������ࣺ</td>
       <td class="rs alignle"><?php echo $form->dropDownlist($model,'cl_type',Yii::app()->params['xh_type']); ?>
       <?php echo $form->error($model,'cl_type'); ?></td>
    </tr>
    <tr>
       <td class="rs">�������</td>
       <td class="rs alignle"><?php echo $form->textField($model,'cl_order',array('size'=>10,'maxlength'=>10)); ?>
       <?php echo $form->error($model,'cl_order'); ?></td>
    </tr>
    <tr>
       <td class="rs">���������</td>
       <td class="rs alignle"><?php echo $form->textArea($model,'cl_description',array('rows'=>3,'cols'=>60,'maxlength'=>250)); ?>
       <?php echo $form->error($model,'cl_description'); ?></td>
    </tr>
    <tr>
       <td class="rs">����������</td>
       <td class="rs alignle"><?php echo $form->textfield($model,'cl_articles',array('disabled'=>'disabled')); ?>
       <?php echo $form->error($model,'cl_articles'); ?></td>
    </tr>
	<tr>
       <td class="rs"></td>
       <td class="rs alignle"><?php echo CHtml::submitButton($model->isNewRecord ? '�������' : '��������޸�'); ?></td>
    </tr>        
 </table>
 
 <?php $this->endWidget(); ?>
 
<!--�б����-->

     </td></tr>
</table>


