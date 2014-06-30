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
		<?php echo $form->label($model,'speed'); ?>
		<?php echo $form->textField($model,'speed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp'); ?>
		<?php echo $form->textField($model,'temp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direction'); ?>
		<?php echo $form->textField($model,'direction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dust'); ?>
		<?php echo $form->textField($model,'dust'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sulfur'); ?>
		<?php echo $form->textField($model,'sulfur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->