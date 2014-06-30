<?php
/* @var $this AirController */
?>
<center><h3> Таблиця спостережень за станом популяції рослин </h3></center>

<div id="data_table">
<?php 
$this->renderPartial('_flora_table', array('dataProvider'=>$dataProvider));
?>
</div>