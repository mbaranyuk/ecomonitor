<?php
 $this->Widget('ext.highsoft.HighsoftWidget', array(
        'type' => 'chart', // or 'stock'
        'options' => array(
            'title' => array(
                'text' => (count($data) == 1) ? 'Графік значень показника' : 'Графік залежності показників',
            ),
            'chart' => array(
                'backgroundColor' => 'transparent',
                'polar'=> true,
	        'type'=> 'column'
            ),
           'series' => $data
        )
    ));
?>
