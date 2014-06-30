<?php
/* @var $this AirController */
?>
<center><h3> Таблиця спостережень за станом популяції тварин </h3></center>

<div id="data_table">
<?php 
$this->renderPartial('_fauna_table', array('dataProvider'=>$dataProvider));
?>
</div>