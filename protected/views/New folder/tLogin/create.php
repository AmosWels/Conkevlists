<?php
/* @var $this TLoginController */
/* @var $model TLogin */

$this->breadcrumbs=array(
	'Tlogins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TLogin', 'url'=>array('index')),
	array('label'=>'Manage TLogin', 'url'=>array('admin')),
);
?>

<h1>Create TLogin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>