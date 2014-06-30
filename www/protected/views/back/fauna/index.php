<?php
$this->breadcrumbs=array(
	'Faunas',
);

$this->menu=array(
	array('label'=>'Create Fauna', 'url'=>array('create')),
	array('label'=>'Manage Fauna', 'url'=>array('admin')),
);
?>

<h1>Faunas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
