<?php
$this->breadcrumbs=array(
	'Waters'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Water', 'url'=>array('index')),
	array('label'=>'Create Water', 'url'=>array('create')),
	array('label'=>'Update Water', 'url'=>array('update', 'id'=>$model->date)),
	array('label'=>'Delete Water', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Water', 'url'=>array('admin')),
);
?>

<h1>View Water #<?php echo $model->date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                    'name'=>'date',
                    'value'=>date("d.m.Y H:i:s", $model["date"])
                ),
		'temp',
		'iron',
		'calcium',
	),
)); ?>
