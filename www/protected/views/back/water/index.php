<?php
$this->breadcrumbs=array(
	'Waters',
);

$this->menu=array(
	array('label'=>'Create Water', 'url'=>array('create')),
	array('label'=>'Manage Water', 'url'=>array('admin')),
);
?>

<h1>Waters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
