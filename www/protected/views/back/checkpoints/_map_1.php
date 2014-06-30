<?php

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

$gMap->enableKMLService('https://maps.google.com.ua/maps/ms?msid=218195646732449681671.00049d0331ef8b646f335&msa=0&output=kml');

$gMap->setContainerId('modal_map');

$gMap->renderMap();
?>
