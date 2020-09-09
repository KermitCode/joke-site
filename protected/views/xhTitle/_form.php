<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-title-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>'return chform();',
		),
)); ?>
	<div class="row">笑话标题：<?php echo $form->textField($model,'tt_title',array('size'=>60,'maxlength'=>100)); ?></div>
	<div class="row">笑话类别：<?php $model->cl_id=26;echo $form->dropDownlist($model,'cl_id',$class_arr); ?>	
  	 来源：<?php echo $form->textField($model,'tt_source',array('size'=>15,'maxlength'=>50)); ?>
     关键词：<?php echo $form->textField($model,'tt_keyword',array('size'=>15,'maxlength'=>100)); ?><font color=red>（用,号分开）</font></div>
	<div class="text"><?php echo CHtml::textArea('te_text','请在这里输入笑话全文..',array('rows'=>16,'cols'=>120,'id'=>'texts','name'=>'texts','visibility'=>"hidden")); ?></div>
	<div class="row buttons">发表作者：<?php echo $form->textField($model,'tt_author',array('readonly'=>'readonly','value'=>Yii::app()->session['er_name'],'class'=>'name')); ?>
	<?php echo CHtml::submitButton($model->isNewRecord ? '发表我的笑话' : 'Save'); ?>
    <font color=red>（发在原创笑话类即进入“网友原创”栏中）</font></div>
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
	editor.sync();if($('#XhTitle_tt_title').val()==''){alert('笑话标题不能为空!');return false;}
	if($('#XhTitle_tt_keyword').val()==''){alert('笑话关键词不能为空!');return false;}
	if($('#texts').html()=='' || $('#texts').html()=='请在这里输入笑话全文..'){alert('您尚未填写笑话内容');return false;}
	var text=$('#texts').html();var leng=text.length;if(leng<60){alert('内容不得小于30个汉字!');return false;}return true;
	}
</script>