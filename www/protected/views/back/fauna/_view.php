<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(Date('d.m.Y H:i:s', $data->date)), array('view', 'id'=>$data->date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('olen')); ?>:</b>
	<?php echo CHtml::encode($data->olen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vedmid')); ?>:</b>
	<?php echo CHtml::encode($data->vedmid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rys')); ?>:</b>
	<?php echo CHtml::encode($data->rys); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gluhar')); ?>:</b>
	<?php echo CHtml::encode($data->gluhar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forel')); ?>:</b>
	<?php echo CHtml::encode($data->forel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salamandra')); ?>:</b>
	<?php echo CHtml::encode($data->salamandra); ?>
	<br />


</div>