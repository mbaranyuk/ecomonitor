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
                'header' => 'Температура, °',
                'name' => 'temp',
            ),
            array(
                'header' => 'Вміст заліза, %',
                'name' => 'iron',
            ),
            array(
                'header' => 'Вміст кальцію, %',
                'name' => 'calcium',
            ),
        ),
    ));
    ?>