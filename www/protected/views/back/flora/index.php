<?php
$this->breadcrumbs=array(
	'Floras',
);

$this->menu=array(
	array('label'=>'Create Flora', 'url'=>array('create')),
	array('label'=>'Manage Flora', 'url'=>array('admin')),
);
?>

<h1>Floras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
