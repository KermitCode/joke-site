<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-title-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>'return chform();',
		),
)); ?>
	<div class="row">Ц�����⣺<?php echo $form->textField($model,'tt_title',array('size'=>60,'maxlength'=>100)); ?></div>
	<div class="row">Ц�����<?php $model->cl_id=26;echo $form->dropDownlist($model,'cl_id',$class_arr); ?>	
  	 ��Դ��<?php echo $form->textField($model,'tt_source',array('size'=>15,'maxlength'=>50)); ?>
     �ؼ��ʣ�<?php echo $form->textField($model,'tt_keyword',array('size'=>15,'maxlength'=>100)); ?><font color=red>����,�ŷֿ���</font></div>
	<div class="text"><?php echo CHtml::textArea('te_text','������������Ц��ȫ��..',array('rows'=>16,'cols'=>120,'id'=>'texts','name'=>'texts','visibility'=>"hidden")); ?></div>
	<div class="row buttons">�������ߣ�<?php echo $form->textField($model,'tt_author',array('readonly'=>'readonly','value'=>Yii::app()->session['er_name'],'class'=>'name')); ?>
	<?php echo CHtml::submitButton($model->isNewRecord ? '�����ҵ�Ц��' : 'Save'); ?>
    <font color=red>������ԭ��Ц���༴���롰����ԭ�������У�</font></div>
<?php $this->endWidget(); ?>
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/lang/zh_CN.js"></script>
<script language="javascript">
       var editor;
			KindEditor.ready(function(K) {
				editor = K.create('#texts', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'link']
				});
			});
function chform(){
	return true;
	editor.sync();if($('#XhTitle_tt_title').val()==''){alert('Ц�����ⲻ��Ϊ��!');return false;}
	if($('#XhTitle_tt_keyword').val()==''){alert('Ц���ؼ��ʲ���Ϊ��!');return false;}
	if($('#texts').html()=='' || $('#texts').html()=='������������Ц��ȫ��..'){alert('����δ��дЦ������');return false;}
	var text=$('#texts').html();var leng=text.length;if(leng<60){alert('���ݲ���С��30������!');return false;}return true;
	}
</script>