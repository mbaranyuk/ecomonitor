<?php if (!Yii::app()->request->isAjaxRequest): ?>

<?php
$this->breadcrumbs=array(
	'Faunas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fauna', 'url'=>array('index')),
	array('label'=>'Manage Fauna', 'url'=>array('admin')),
);
?>

<h1>Create Fauna</h1>

<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>