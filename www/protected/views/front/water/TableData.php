<?php
/* @var $this AirController */
?>
<center><h3> Таблиця спостережень за станом поверхневих вод </h3></center>

<div id="data_table">
<?php 
$this->renderPartial('_water_table', array('dataProvider'=>$dataProvider));
?>
</div>