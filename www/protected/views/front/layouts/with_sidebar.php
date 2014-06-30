<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="sidebar">
    <?php $this->renderPartial('sidebar'); ?>
    
    <?php if (Yii::app()->controller->action->id != 'index'):?>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Mykola Baraniuk.
	</div> <!-- footer -->
    <?php endif; ?>
</div><!-- sidebar -->

<div id="content" style="margin-left: 301px; padding: 0 10px;">
    <?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>