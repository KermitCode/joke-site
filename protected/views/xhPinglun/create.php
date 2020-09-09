<?php
/* @var $this XhPinglunController */
/* @var $model XhPinglun */

$this->breadcrumbs=array(
	'Xh Pingluns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List XhPinglun', 'url'=>array('index')),
	array('label'=>'Manage XhPinglun', 'url'=>array('admin')),
);
?>

<h1>Create XhPinglun</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>