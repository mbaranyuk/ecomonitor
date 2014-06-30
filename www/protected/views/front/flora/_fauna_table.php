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
                'name' => 'olen',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'vedmid',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'rys',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'gluhar',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'forel',
            ),
            array(
                'header' => 'К-ть особин',
                'name' => 'salamandra',
            ),
        ),
    ));
    ?>