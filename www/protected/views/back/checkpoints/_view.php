<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unic_name')); ?>:</b>
	<?php echo CHtml::encode($data->unic_name); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
	<?php echo CHtml::encode($data->about); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />


</div>