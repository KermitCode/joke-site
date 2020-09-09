<?php
/* @var $this XhPinglunController */
/* @var $model XhPinglun */

$this->breadcrumbs=array(
	'Xh Pingluns'=>array('index'),
	$model->pl_id,
);

$this->menu=array(
	array('label'=>'List XhPinglun', 'url'=>array('index')),
	array('label'=>'Create XhPinglun', 'url'=>array('create')),
	array('label'=>'Update XhPinglun', 'url'=>array('update', 'id'=>$model->pl_id)),
	array('label'=>'Delete XhPinglun', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pl_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage XhPinglun', 'url'=>array('admin')),
);
?>

<h1>View XhPinglun #<?php echo $model->pl_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pl_id',
		'pl_type',
		'pl_tt_id',
		'pl_author',
		'pl_text',
		'pl_time',
		'pl_visible',
	),
)); ?>
