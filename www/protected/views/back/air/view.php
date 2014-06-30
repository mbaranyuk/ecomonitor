<?php
$this->breadcrumbs=array(
	'Airs'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Air', 'url'=>array('index')),
	array('label'=>'Create Air', 'url'=>array('create')),
	array('label'=>'Update Air', 'url'=>array('update', 'id'=>$model->date)),
	array('label'=>'Delete Air', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Air', 'url'=>array('admin')),
);
?>

<h1>View Air #<?php echo $model->date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                    'name'=>'date',
                    'value'=>date("d.m.Y H:i:s", $model["date"])
                ),
		'speed',
		'temp',
		'direction',
		'dust',
		'sulfur',
	),
)); ?>
