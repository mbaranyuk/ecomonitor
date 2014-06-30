<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Faunas'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fauna', 'url'=>array('index')),
	array('label'=>'Create Fauna', 'url'=>array('create')),
	array('label'=>'View Fauna', 'url'=>array('view', 'id'=>$model->date)),
	array('label'=>'Manage Fauna', 'url'=>array('admin')),
);
?>

<h1>Update Fauna <?php echo $model->date; ?></h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>