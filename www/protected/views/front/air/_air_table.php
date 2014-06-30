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
                'header' => 'Швидкість, м/с',
                'name' => 'speed',
            ),
            array(
                'header' => 'Температура, °',
                'name' => 'temp',
            ),
            array(
                'header' => 'Напрям, °',
                'name' => 'direction',
            ),
            array(
                'header' => 'Вологість, %',
                'name' => 'dust',
            ),
            array(
                'header' => 'Оксид сірки, %',
                'name' => 'sulfur',
            ),
        ),
    ));
    ?>