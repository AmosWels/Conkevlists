<?php
/* @var $this TLoginController */
/* @var $model TLogin */

$this->breadcrumbs=array(
	'Tlogins'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List TLogin', 'url'=>array('index')),
	array('label'=>'Create TLogin', 'url'=>array('create')),
	array('label'=>'View TLogin', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'Manage TLogin', 'url'=>array('admin')),
);
?>

<h1>Update TLogin <?php echo $model->userid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>