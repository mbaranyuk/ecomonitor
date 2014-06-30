<?php
/* @var $this AirMarkerController */
?>
<?php
$this->renderPartial('//userpage/marker_info', array('marker'=>$marker));
?>

<div id="chart">
<?php 
$this->renderPartial('//userpage/_chart', array('data'=>$data));
?>
</div>