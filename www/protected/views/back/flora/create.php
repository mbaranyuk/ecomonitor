<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Floras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Flora', 'url'=>array('index')),
	array('label'=>'Manage Flora', 'url'=>array('admin')),
);
?>

<h1>Create Flora</h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>