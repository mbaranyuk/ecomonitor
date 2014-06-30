<?php
/* @var $this AirMarkerController */
?>
<?php
$this->renderPartial('//userpage/marker_info', array('marker'=>$marker));
?>

<center><h3> Таблиця спостережень за забрудненням </h3></center>

<div id="data_table">
<?php 
$this->renderPartial('//userpage/_air_table', array('dataProvider'=>$dataProvider));
?>
</div>