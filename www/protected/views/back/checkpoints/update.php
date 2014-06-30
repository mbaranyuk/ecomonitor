<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Checkpoints'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Checkpoints', 'url'=>array('index')),
	array('label'=>'Create Checkpoints', 'url'=>array('create')),
	array('label'=>'View Checkpoints', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Checkpoints', 'url'=>array('admin')),
);
?>

<h1>Update Checkpoints <?php echo $model->id; ?></h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>