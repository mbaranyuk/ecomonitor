<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(Date('d.m.Y H:i:s', $data->date)), array('view', 'id'=>$data->date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jalovec_kozachyj')); ?>:</b>
	<?php echo CHtml::encode($data->jalovec_kozachyj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lypa_shyrokolysta')); ?>:</b>
	<?php echo CHtml::encode($data->lypa_shyrokolysta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tys_jagidnyj')); ?>:</b>
	<?php echo CHtml::encode($data->tys_jagidnyj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('narcys')); ?>:</b>
	<?php echo CHtml::encode($data->narcys); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roman_karpatskyj')); ?>:</b>
	<?php echo CHtml::encode($data->roman_karpatskyj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('antragena_alpijska')); ?>:</b>
	<?php echo CHtml::encode($data->antragena_alpijska); ?>
	<br />


</div>