<?php
/* @var $this TLoginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tlogins',
);

$this->menu=array(
	array('label'=>'Create TLogin', 'url'=>array('create')),
	array('label'=>'Manage TLogin', 'url'=>array('admin')),
);
?>

<h1>Tlogins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
