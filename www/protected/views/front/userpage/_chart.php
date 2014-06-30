<?php

//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/protected/extensions/highsoft/assets/themes/grid.js', CClientScript::POS_BEGIN);
?>

<?php

/**
 * array_key_exists_r function.
 *
 * @param mixed $needle The key you want to check for
 * @param mixed $haystack The array you want to search
 * @return bool
 */
function array_key_exists_r($needle, $haystack) {
    $result = array_key_exists($needle, $haystack);
    if ($result)
        return $result;
    foreach ($haystack as $v) {
        if (is_array($v)) {
            $result = array_key_exists_r($needle, $v);
        }
        if ($result)
            return $result;
    }
    return $result;
}

//=============================================================================

if (array_key_exists_r('data', $data)) {
    $this->Widget('ext.highsoft.HighsoftWidget', array(
        'type' => 'chart', // or 'stock'
        'options' => array(
            'title' => array(
                'text' => (count($data) == 1) ? 'Графік значень показника' : 'Графік залежності показників',
            ),
            'chart' => array(
                'backgroundColor' => 'transparent'
            ),
            'xAxis' => array(
                'type' => 'datetime'
            ),
            'yAxis' => array(
                'title' => array(
                    'text' => 'Дані'
                ),
//                'plotLines' => array(
//                    array(
//                        'color' => '#FF0000',
//                        'dashStyle' => 'ShortDash',
//                        'width' => 2,
//                        'value' => 22,
//                        'zIndex' => 100,
//                        'label' => array(
//                            'text' => 'Goal'
//                        )),
//                    array(
//                        'color' => '#008000',
//                        'dashStyle' => 'ShortDash',
//                        'width' => 2,
//                        'value' => 10,
//                        'zIndex' => 100,
//                        'label' => array(
//                            'text' => 'Last Year\'s Maximum Revenue'
//                        ))
//                )
            ),
            'series' => $data
        )
    ));
} else {
    echo '<h3> Немає даних для відображення! </h3>';
}
?>