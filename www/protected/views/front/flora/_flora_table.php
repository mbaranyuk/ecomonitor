    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
//        'ajaxUpdate'=>'data_table',
        'columns' => array(
            array(
                'header' => 'Дата',
                'name' => 'date',
                'value' => 'date("d.m.Y H:i:s", $data["date"])',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'jalovec_kozachyj',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'lypa_shyrokolysta',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'tys_jagidnyj',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'narcys',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'roman_karpatskyj',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'antragena_alpijska',
            ),
        ),
    ));
    ?>