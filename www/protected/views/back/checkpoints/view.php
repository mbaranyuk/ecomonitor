<?php
$this->breadcrumbs=array(
	'Checkpoints'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Checkpoints', 'url'=>array('index')),
	array('label'=>'Create Checkpoints', 'url'=>array('create')),
	array('label'=>'Update Checkpoints', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Checkpoints', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Checkpoints', 'url'=>array('admin')),
);
?>

<h1>View Checkpoints #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'unic_name',
                'about',
		'latitude',
		'longitude',
	),
)); ?>
