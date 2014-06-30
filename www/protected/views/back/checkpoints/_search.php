<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unic_name'); ?>
		<?php echo $form->textField($model,'unic_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'about'); ?>
		<?php echo $form->textField($model,'about'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->