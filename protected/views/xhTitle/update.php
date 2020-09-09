<?php
/* @var $this XhTitleController */
/* @var $model XhTitle */

$this->breadcrumbs=array(
	'Xh Titles'=>array('index'),
	$model->tt_id=>array('view','id'=>$model->tt_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List XhTitle', 'url'=>array('index')),
	array('label'=>'Create XhTitle', 'url'=>array('create')),
	array('label'=>'View XhTitle', 'url'=>array('view', 'id'=>$model->tt_id)),
	array('label'=>'Manage XhTitle', 'url'=>array('admin')),
);
?>

<h1>Update XhTitle <?php echo $model->tt_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>