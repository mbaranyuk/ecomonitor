<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jalovec_kozachyj'); ?>
		<?php echo $form->textField($model,'jalovec_kozachyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lypa_shyrokolysta'); ?>
		<?php echo $form->textField($model,'lypa_shyrokolysta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tys_jagidnyj'); ?>
		<?php echo $form->textField($model,'tys_jagidnyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'narcys'); ?>
		<?php echo $form->textField($model,'narcys'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roman_karpatskyj'); ?>
		<?php echo $form->textField($model,'roman_karpatskyj'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'antragena_alpijska'); ?>
		<?php echo $form->textField($model,'antragena_alpijska'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->