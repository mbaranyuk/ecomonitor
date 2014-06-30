<?php
$this->breadcrumbs=array(
	'Checkpoints',
);

$this->menu=array(
	array('label'=>'Create Checkpoints', 'url'=>array('create')),
	array('label'=>'Manage Checkpoints', 'url'=>array('admin')),
);
?>

<h1>Checkpoints</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
