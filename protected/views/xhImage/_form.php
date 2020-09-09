<?php
/* @var $this XhImageController */
/* @var $model XhImage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-image-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cl_id'); ?>
		<?php echo $form->textField($model,'cl_id',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'cl_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_title'); ?>
		<?php echo $form->textArea($model,'im_title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'im_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_mainimg'); ?>
		<?php echo $form->textField($model,'im_mainimg',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'im_mainimg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_urls'); ?>
		<?php echo $form->textArea($model,'img_urls',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'img_urls'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_time'); ?>
		<?php echo $form->textField($model,'im_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_source'); ?>
		<?php echo $form->textField($model,'im_source',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'im_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_author'); ?>
		<?php echo $form->textField($model,'im_author',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'im_author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_views'); ?>
		<?php echo $form->textField($model,'im_views',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_views'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_showviews'); ?>
		<?php echo $form->textField($model,'im_showviews',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_showviews'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_voters_up'); ?>
		<?php echo $form->textField($model,'im_voters_up',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_voters_up'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_voters_down'); ?>
		<?php echo $form->textField($model,'im_voters_down',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_voters_down'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_comments'); ?>
		<?php echo $form->textField($model,'im_comments',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_score'); ?>
		<?php echo $form->textField($model,'im_score',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'im_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_baoxiao'); ?>
		<?php echo $form->textField($model,'im_baoxiao'); ?>
		<?php echo $form->error($model,'im_baoxiao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'im_visible'); ?>
		<?php echo $form->textField($model,'im_visible'); ?>
		<?php echo $form->error($model,'im_visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publiced'); ?>
		<?php echo $form->textField($model,'publiced'); ?>
		<?php echo $form->error($model,'publiced'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->