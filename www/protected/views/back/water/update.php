<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Waters'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Water', 'url'=>array('index')),
	array('label'=>'Create Water', 'url'=>array('create')),
	array('label'=>'View Water', 'url'=>array('view', 'id'=>$model->date)),
	array('label'=>'Manage Water', 'url'=>array('admin')),
);
?>

<h1>Update Water <?php echo $model->date; ?></h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>