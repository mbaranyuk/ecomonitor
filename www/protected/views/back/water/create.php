<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Waters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Water', 'url'=>array('index')),
	array('label'=>'Manage Water', 'url'=>array('admin')),
);
?>

<h1>Create Water</h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>