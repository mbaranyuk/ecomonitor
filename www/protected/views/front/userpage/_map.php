<?php
//Yii::app()->clientScript->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/gmaps.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/GeoJSON.js');

//$sc = file_get_contents(Yii::app()->basePath .'\..\js\map.js');
//Yii::app()->clientScript->registerScript('map', $sc, CClientScript::POS_READY);



Yii::import('ext.egmap.*');

$gMap = new EGMap();
$options = array(
    'mapTypeControlOptions' => array(
        'position' => EGMapControlPosition::RIGHT_TOP,
        'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
    ),
    'mapTypeId' => EGMap::TYPE_TERRAIN,
    'streetViewControl' => 'false'
);

$gMap->zoom = 15;
$gMap->setWidth('100%');
$gMap->setHeight('100%');
$gMap->setCenter(48.026055, 24.167536);

$gMap->setOptions($options);

//poligons from DB-controller-idex_view
//foreach ($poligons as $poligon) {
//    $gMap->addPolygon($poligon);
//}

$gMap->enableKMLService('https://maps.google.com.ua/maps/ms?msid=218195646732449681671.00049d0331ef8b646f335&msa=0&output=kml');

//draw markers
if (!is_null($markers)) {
    foreach ($markers as $marker) {
        $gMap->addMarker($marker);
    }
}

$gMap->setContainerId('map');

$gMap->renderMap();
?>