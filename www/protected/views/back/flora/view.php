<?php
$this->breadcrumbs=array(
	'Floras'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Flora', 'url'=>array('index')),
	array('label'=>'Create Flora', 'url'=>array('create')),
	array('label'=>'Update Flora', 'url'=>array('update', 'id'=>$model->date)),
	array('label'=>'Delete Flora', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Flora', 'url'=>array('admin')),
);
?>

<h1>View Flora #<?php echo $model->date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                    'name'=>'date',
                    'value'=>date("d.m.Y H:i:s", $model["date"])
                ),
		'jalovec_kozachyj',
		'lypa_shyrokolysta',
		'tys_jagidnyj',
		'narcys',
		'roman_karpatskyj',
		'antragena_alpijska',
	),
)); ?>
