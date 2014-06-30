<?php
$this->breadcrumbs=array(
	'Airs',
);

$this->menu=array(
	array('label'=>'Create Air', 'url'=>array('create')),
	array('label'=>'Manage Air', 'url'=>array('admin')),
);
?>

<h1>Airs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
