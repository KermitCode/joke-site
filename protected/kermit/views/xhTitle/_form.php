<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->�������޸�Ц������</td></tr>
    <tr><td>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-title-form',
	'enableAjaxValidation'=>false,
)); ?>

 <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
      <tr>
        <td class="head" colspan="2"></td>
      </tr>

	<tr>
       <td class="rs"><?php echo $form->labelEx($model,'tt_title'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'tt_title',array('size'=>60,'maxlength'=>100)); ?>
       <?php echo $form->error($model,'tt_title'); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'cl_id'); ?></td>
       <td class="rs alignle"><?php echo $form->dropDownlist($model,'cl_id',$class_arr); ?>
       <?php echo $form->error($model,'cl_id'); ?>&nbsp;&nbsp;
       <?php echo $form->labelEx($model,'tt_source'); ?>ԭ��<input type="checkbox" name="my" value='1' <?php if($model->tt_source==1) echo 'checked';?> /> ����ת��<?php echo $form->textField($model,'tt_source',array('size'=>20,'maxlength'=>50)); ?> (ע��<font color=blue>ԭ���򱻱�ע��������Դ����Ч</font>)
       
       </td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'tt_keyword'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'tt_keyword',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tt_keyword'); ?> <font color=red>(�ؼ���֮�����ö��ŷָ���)</font>
        &nbsp;��Ц����<?php echo $form->radioButtonlist($model,'tt_best',Yii::app()->params['tt_best'],array('separator'=>'&nbsp;')); ?></td>
    </tr>
    <tr>
       <td class="rs">�������ݣ�</td>
       <td class="rs alignle">
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#text');
        });
</script> 
<textarea name="text" id="text" style="width:65%;height:300px;margin-top:15px;">
<?php echo $text;?>
</textarea></td>
    </tr>

    <tr>
       <td class="rs"></td>
       <td class="rs alignle"><?php echo CHtml::submitButton($model->isNewRecord ? '������Ц��' : '�޸Ĵ�ƪЦ��'); ?></td>
    </tr>
 </table>
 
 <?php $this->endWidget(); ?>
 
<!--�б����-->

     </td></tr>
</table>