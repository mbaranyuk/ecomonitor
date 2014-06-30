<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Floras'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Flora', 'url'=>array('index')),
	array('label'=>'Create Flora', 'url'=>array('create')),
	array('label'=>'View Flora', 'url'=>array('view', 'id'=>$model->date)),
	array('label'=>'Manage Flora', 'url'=>array('admin')),
);
?>

<h1>Update Flora <?php echo $model->date; ?></h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>