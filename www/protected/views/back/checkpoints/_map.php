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


$gMap->setOptions($options);

$gMap->enableKMLService('https://maps.google.com.ua/maps/ms?msid=218195646732449681671.00049d0331ef8b646f335&msa=0&output=kml');

 
// Saving coordinates after user dragged our marker.
$dragevent = new EGMapEvent('dragend', "function (event) { 
                                            $('#Checkpoints_latitude').val(event.latLng.lat());
                                            $('#Checkpoints_longitude').val(event.latLng.lng());
                                            }"
                                            , false, EGMapEvent::TYPE_EVENT_DEFAULT);
 
// If we have already created marker - show it

    $gMap->setCenter(48.026055, 24.167536);
 
    // Setting up new event for user click on map, so marker will be created on place and respectful event added.
    $gMap->addEvent(new EGMapEvent('click',
            'function (event) {var marker = new google.maps.Marker({position: event.latLng, map: '.$gMap->getJsName().
            ', draggable: true }); '.$gMap->getJsName().
            '.setCenter(event.latLng); var dragevent = '.$dragevent->toJs('marker').
            '; $("#Checkpoints_latitude").val(event.latLng.lat());
                                            $("#Checkpoints_longitude").val(event.latLng.lng()); }', false, EGMapEvent::TYPE_EVENT_DEFAULT_ONCE));

$gMap->setContainerId('modal_map');

$gMap->renderMap();
?>
