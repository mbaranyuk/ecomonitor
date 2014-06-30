<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(Date('d.m.Y H:i:s', $data->date)), array('view', 'id'=>$data->date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speed')); ?>:</b>
	<?php echo CHtml::encode($data->speed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp')); ?>:</b>
	<?php echo CHtml::encode($data->temp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direction')); ?>:</b>
	<?php echo CHtml::encode($data->direction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dust')); ?>:</b>
	<?php echo CHtml::encode($data->dust); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sulfur')); ?>:</b>
	<?php echo CHtml::encode($data->sulfur); ?>
	<br />


</div>