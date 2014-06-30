<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Checkpoints'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Checkpoints', 'url'=>array('index')),
	array('label'=>'Manage Checkpoints', 'url'=>array('admin')),
);
?>

<h1>Create Checkpoints</h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>