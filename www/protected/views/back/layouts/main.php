<?php /* @var $this Controller */ ?>
<!DOCTYPE html">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ua" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/header.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/footer.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="page" >

	<div id="header">
		<!-- <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div> -->
		<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu', 
                        array(
			'items'=>array(
                                array('label'=>'Профіль', 'url'=>array('adminpage/index')),
				array('label'=>'Атмосфера', 'url'=>array('/air/index')),
				array('label'=>'Водойми', 'url'=>array('/water/index')),
                                array('label'=>'Флора', 'url'=>array('/flora/index')),
                                array('label'=>'Фауна', 'url'=>array('/fauna/index')),
                                array('label'=>'Пункти контролю', 'url'=>array('/checkpoints/index')),
			),
		)
                ); ?>
		</div><!-- mainmenu -->
		<div id="addmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(	
				array('url'=>'/admin.php', 
					'label'=>'Вхід',
					'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Вийти('.Yii::app()->user->name.')', 'url'=>'/admin.php?r=adminpage/logout', 'visible'=>!Yii::app()->user->isGuest),
			),
			)); ?>
		</div>
	</div><!-- header -->
        
        
        <div style="width: 1000px; margin: 0 auto; position: relative">
    
            <?php echo $content; ?>

            
            <div class="clear"> </div>
        </div>
        
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Mykola Baraniuk.
	</div> <!--footer -->

</div><!-- page -->

</body>
</html>
