<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fauna-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php //echo $form->error($model,'date'); ?>
           <? $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'date',
                        'attribute' => 'date',
                        'language' => 'ru',
                        'value'=>  $model->isNewRecord ? date('d.m.Y') : date('d.m.Y', $model->date),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker',
                        ),
                    ));
           ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'olen'); ?>
		<?php echo $form->textField($model,'olen'); ?>
		<?php echo $form->error($model,'olen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vedmid'); ?>
		<?php echo $form->textField($model,'vedmid'); ?>
		<?php echo $form->error($model,'vedmid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rys'); ?>
		<?php echo $form->textField($model,'rys'); ?>
		<?php echo $form->error($model,'rys'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gluhar'); ?>
		<?php echo $form->textField($model,'gluhar'); ?>
		<?php echo $form->error($model,'gluhar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'forel'); ?>
		<?php echo $form->textField($model,'forel'); ?>
		<?php echo $form->error($model,'forel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salamandra'); ?>
		<?php echo $form->textField($model,'salamandra'); ?>
		<?php echo $form->error($model,'salamandra'); ?>
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
								$("#DialogCRUDForm").html(r).dialog("option", "title", "'.($model->isNewRecord ? 'Create' : 'Update').' Fauna").dialog("open"); return false;
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