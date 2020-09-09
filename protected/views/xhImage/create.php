<?php
/* @var $this XhImageController */
/* @var $model XhImage */

$this->breadcrumbs=array(
	'Xh Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List XhImage', 'url'=>array('index')),
	array('label'=>'Manage XhImage', 'url'=>array('admin')),
);
?>

<h1>Create XhImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>