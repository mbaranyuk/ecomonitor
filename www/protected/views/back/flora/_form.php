<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flora-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php ///echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php //echo $form->error($model,'date'); ?>
            <?$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
		<?php echo $form->labelEx($model,'jalovec_kozachyj'); ?>
		<?php echo $form->textField($model,'jalovec_kozachyj'); ?>
		<?php echo $form->error($model,'jalovec_kozachyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lypa_shyrokolysta'); ?>
		<?php echo $form->textField($model,'lypa_shyrokolysta'); ?>
		<?php echo $form->error($model,'lypa_shyrokolysta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tys_jagidnyj'); ?>
		<?php echo $form->textField($model,'tys_jagidnyj'); ?>
		<?php echo $form->error($model,'tys_jagidnyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'narcys'); ?>
		<?php echo $form->textField($model,'narcys'); ?>
		<?php echo $form->error($model,'narcys'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roman_karpatskyj'); ?>
		<?php echo $form->textField($model,'roman_karpatskyj'); ?>
		<?php echo $form->error($model,'roman_karpatskyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antragena_alpijska'); ?>
		<?php echo $form->textField($model,'antragena_alpijska'); ?>
		<?php echo $form->error($model,'antragena_alpijska'); ?>
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
								$("#DialogCRUDForm").html(r).dialog("option", "title", "'.($model->isNewRecord ? 'Create' : 'Update').' Flora").dialog("open"); return false;
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