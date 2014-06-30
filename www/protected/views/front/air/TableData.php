<?php
/* @var $this AirController */
?>
<center><h3> Таблиця спостережень за станом атмосферного повітря </h3></center>

<div id="data_table">
<?php 
$this->renderPartial('_air_table', array('dataProvider'=>$dataProvider));
?>
</div>