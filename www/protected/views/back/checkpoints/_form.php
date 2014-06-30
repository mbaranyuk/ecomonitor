
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'modal_map',
    'options' => array(
        'title' => 'Встановити пункт моніторингу',
        'width'=>600,
        'height'=>600,
        'autoOpen' => false,
        'modal' => true,
        'resizable' => true,
    ),
));

$this->renderPartial('_map');

$this->endWidget('zii.widgets.jui.CJuiDialog');
?> 

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkpoints-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', PointType::model()->getTypes()); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unic_name'); ?>
		<?php echo $form->textField($model,'unic_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'unic_name'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'about'); ?>
		<?php echo $form->textArea($model,'about'); ?>
		<?php echo $form->error($model,'about'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>
        <div id="map_buton" style="margin-left: 150px; font-weight: bold;">
            <?php echo CHtml::link('На карті', '#', array('onclick' => '$("#modal_map").dialog("open"); return false;',)); ?>
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<?php if (!Yii::app()->request->isAjaxRequest): ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
	
	<?php else: ?>
	<div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
		<div class="ui-dialog-buttonset">
		<?php			$this->widget('zii.widgets.jui.CJuiButton', array(
				'name'=>'submit_'.rand(),
				'caption'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
				'htmlOptions'=>array(
					'ajax' => array(
						'url'=>$model->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id'=>$model->id)),
						'type'=>'post',
						'data'=>'js:jQuery(this).parents("form").serialize()',
						'success'=>'function(r){
							if(r=="success"){
								window.location.reload();
							}
							else{
								$("#DialogCRUDForm").html(r).dialog("option", "title", "'.($model->isNewRecord ? 'Create' : 'Update').' Checkpoints").dialog("open"); return false;
							}
						}', 
					),
				),
			));
		?>
		</div>
	</div>
	<?php endif; ?>

<?php $this->endWidget(); ?>

</div><!-- form -->