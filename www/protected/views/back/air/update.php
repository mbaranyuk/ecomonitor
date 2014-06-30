<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Airs'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Air', 'url'=>array('index')),
	array('label'=>'Create Air', 'url'=>array('create')),
	array('label'=>'View Air', 'url'=>array('view', 'id'=>$model->date)),
	array('label'=>'Manage Air', 'url'=>array('admin')),
);
?>

<h1>Update Air <?php echo $model->date; ?></h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>