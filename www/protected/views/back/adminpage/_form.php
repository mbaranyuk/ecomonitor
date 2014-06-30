<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
        'stateful' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work'); ?>
		<?php echo $form->textField($model,'work'); ?>
		<?php echo $form->error($model,'work'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($model, 'photo'); ?>
                <?php echo $form->fileField($model, 'photo'); ?>
                <?php echo $form->error($model, 'photo'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->textField($model,'pass'); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel'); ?>
		<?php echo $form->error($model,'tel'); ?>
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
								$("#DialogCRUDForm").html(r).dialog("option", "title", "'.($model->isNewRecord ? 'Create' : 'Update').' Admin").dialog("open"); return false;
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