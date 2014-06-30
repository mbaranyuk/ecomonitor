<?php
$this->breadcrumbs=array(
	'Airs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Air', 'url'=>array('index')),
	array('label'=>'Create Air', 'url'=>array('create'), 'linkOptions'=>array(
		'ajax' => array(
			'url'=>$this->createUrl('create'),
			'success'=>'js:function(r){$("#DialogCRUDForm").html(r).dialog("option", "title", "Create Air").dialog("open"); return false;}',
		),
	)),
);

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'DialogCRUDForm',
        'options'=>array(
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>'auto',
			'height'=>'auto',
			'resizable'=>'false',
		),
	));
$this->endWidget();

$updateDialog =<<<'EOT'
function() {
	var url = $(this).attr('href');
    $.get(url, function(r){
        $("#update").html(r).dialog("open");
		$("#DialogCRUDForm").html(r).dialog("option", "title", "Update Air").dialog("open");
    });
    return false;
}
EOT;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('air-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Airs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'air-grid',
	'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'date',
                    'value'=>'date("d.m.Y H:i:s", $data["date"])'
                ),
		'speed',
		'temp',
		'direction',
		'dust',
		'sulfur',
		array(
			'class'=>'CButtonColumn',
			'buttons' => array(
				'update' => array(
					'click'=>$updateDialog
				),
			), 
		),
	),
)); ?>
