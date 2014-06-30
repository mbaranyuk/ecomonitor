<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(Date('d.m.Y H:i:s', $data->date)), array('view', 'id'=>$data->date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp')); ?>:</b>
	<?php echo CHtml::encode($data->temp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iron')); ?>:</b>
	<?php echo CHtml::encode($data->iron); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calcium')); ?>:</b>
	<?php echo CHtml::encode($data->calcium); ?>
	<br />


</div>