<?php
$this->breadcrumbs=array(
	'Faunas'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Fauna', 'url'=>array('index')),
	array('label'=>'Create Fauna', 'url'=>array('create')),
	array('label'=>'Update Fauna', 'url'=>array('update', 'id'=>$model->date)),
	array('label'=>'Delete Fauna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fauna', 'url'=>array('admin')),
);
?>

<h1>View Fauna #<?php echo $model->date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                    'name'=>'date',
                    'value'=>date("d.m.Y H:i:s", $model["date"])
                ),
		'olen',
		'vedmid',
		'rys',
		'gluhar',
		'forel',
		'salamandra',
	),
)); ?>
