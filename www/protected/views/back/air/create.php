<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Airs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Air', 'url'=>array('index')),
	array('label'=>'Manage Air', 'url'=>array('admin')),
);
?>

<h1>Create Air</h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>