<?php
/* @var $this XhImageController */
/* @var $model XhImage */

$this->breadcrumbs=array(
	'Xh Images'=>array('index'),
	$model->im_id=>array('view','id'=>$model->im_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List XhImage', 'url'=>array('index')),
	array('label'=>'Create XhImage', 'url'=>array('create')),
	array('label'=>'View XhImage', 'url'=>array('view', 'id'=>$model->im_id)),
	array('label'=>'Manage XhImage', 'url'=>array('admin')),
);
?>

<h1>Update XhImage <?php echo $model->im_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>