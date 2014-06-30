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
		<?php echo $form->label($model,'temp'); ?>
		<?php echo $form->textField($model,'temp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iron'); ?>
		<?php echo $form->textField($model,'iron'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calcium'); ?>
		<?php echo $form->textField($model,'calcium'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->