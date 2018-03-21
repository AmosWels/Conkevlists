<?php
/* @var $this TLoginController */
/* @var $model TLogin */

$this->breadcrumbs=array(
	'Tlogins'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'List TLogin', 'url'=>array('index')),
	array('label'=>'Create TLogin', 'url'=>array('create')),
	array('label'=>'Update TLogin', 'url'=>array('update', 'id'=>$model->userid)),
	array('label'=>'Delete TLogin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TLogin', 'url'=>array('admin')),
);
?>

<h1>View TLogin #<?php echo $model->userid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'userid',
		'username',
		'password',
		'roles',
		'status',
	),
)); ?>
