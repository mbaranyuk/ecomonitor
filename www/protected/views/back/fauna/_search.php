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
		<?php echo $form->label($model,'olen'); ?>
		<?php echo $form->textField($model,'olen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vedmid'); ?>
		<?php echo $form->textField($model,'vedmid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rys'); ?>
		<?php echo $form->textField($model,'rys'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gluhar'); ?>
		<?php echo $form->textField($model,'gluhar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'forel'); ?>
		<?php echo $form->textField($model,'forel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salamandra'); ?>
		<?php echo $form->textField($model,'salamandra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->