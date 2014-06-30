<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ua" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/header.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/footer.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="page">

        <div id="logo">СИСТЕМА ІНФОРМАЦІЙНОЇ ПІДТРИМКИ МОНІТОРИНГУ СТАНУ ПРИРОДООХОРОННОЇ ТЕРИТОРІЇ</div>
	<div id="header">
            
		<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Головна', 'url'=>array('/userpage/index')),
				array('label'=>'Атмосфера', 'url'=>array('/air')),
				array('label'=>'Водойми', 'url'=>array('/water')),
                                array('label'=>'Популяція флори', 'url'=>array('/flora')),
                                array('label'=>'Популяція фауни', 'url'=>array('/fauna')),                                        
			),
		)); ?>
		</div><!-- mainmenu -->
		<div id="addmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(	
				array('url'=>array('/userpage/about'), 
					'label'=>'?',
				),
				array('url'=>'/admin.php', 
					'label'=>'Вхід адміністратора',
					'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Вийти('.Yii::app()->user->name.')', 'url'=>'/admin.php?r=adminpage/logout', 'visible'=>!Yii::app()->user->isGuest),
			),
			)); ?>
		</div>
	</div><!-- header -->
        
        
	<?php echo $content; ?>
        
</div><!-- page -->

</body>
</html>
