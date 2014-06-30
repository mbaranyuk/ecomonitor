<? Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/front/sidebar.css'); ?>

<div class="sidebar_form">
    <?php echo CHtml::form(); ?>
    <div class="form_caption"> Графік стану популяції </div>
    <table valign="top">
        <tbody>
            <tr>
                <td width="15%">Показник:</td> 
                <td width="85%"><?= CHtml::dropDownList('field', '', Yii::app()->params['side_labels']); ?></td> 
            </tr>
            <tr>
                <td>Початкова дата:</td> 
                <td>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'start_date',
                        'attribute' => 'start_date',
                        'language' => 'ru',
                        'value'=>  date('d.m.Y', strtotime('-1 month')),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker',
                        ),
                    ));
                    ?>
                </td> 
            </tr>
            <tr>
                <td>Кінцева дата:</td> 
                <td>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'end_date',
                        'attribute' => 'end_date',
                        'language' => 'ru',
                        'value'=>  date('d.m.Y'),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker',
                        ),
                    ));
                    ?>
                </td> 
            </tr>
            <tr>
                <td colspan="2"> <center> 
                    <?php
                        echo CHtml::ajaxSubmitButton('Показати', array('Fauna/ChartData'), array('type' => 'POST', 'update' => '#content'), array('class' => 'sbmt', 'type' => 'submit'));
                    ?> 
                </center> </td> 
        </tr>

        </tbody>
    </table>
    <?php echo CHtml::endForm(); ?>  
</div>

<div class="sidebar_form">
    <?php echo CHtml::form(); ?>
    <div class="form_caption"> Графік залежності станів показників популяції </div>
    <table>
        <tbody>
            <tr>
                <td>Показник:</td> 
                <td><?= CHtml::dropDownList('field', '', Yii::app()->params['side_labels']); ?></td> 
            </tr>
            <tr>
                <td style="width: 15%;">Показник <sup>2</sup>:</td> 
                <td style="width: 85%;"><?= CHtml::dropDownList('field2', '', Yii::app()->params['side_labels']); ?></td> 
            </tr>
            <tr>
                <td>Початкова дата:</td> 
                <td>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'start_date2',
                        'attribute' => 'start_date',
                        'language' => 'ru',
                        'value'=>  date('d.m.Y', strtotime('-1 month')),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker'
                        ),
                    ));
                    ?>
                </td> 
            </tr>
            <tr>
                <td>Кінцева дата:</td> 
                <td>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'end_date2',
                        'attribute' => 'end_date',
                        'language' => 'ru',
                        'value' => date('d.m.Y'),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker',
                        ),
                    ));
                    ?>
                </td> 
            </tr>
            <tr>
                <td colspan="2"> <center> 
                    <?php
                         echo CHtml::ajaxSubmitButton('Показати', array('Fauna/ChartMultiData'), array('type' => 'POST', 'update' => '#content'), array('class' => 'sbmt', 'type' => 'submit'));
                    ?> 
                </center> </td> 
        </tr>

        </tbody>
    </table>
    <?php echo CHtml::endForm(); ?>  
</div>

<div class="sidebar_form" id="table_f">
    <?php echo CHtml::form(); ?>
    <div class="form_caption"> Таблиця спостережень за популяцією тварин  </div>
    <table>
        <tbody>
            <tr>
                <td style="width: 15%;">Місяць:</td> 
                <td style="width: 85%;"><?=
                    CHtml::dropDownList('month', '', Yii::app()->params['side_month_list']);
                    ?></td> 
            </tr>
            <tr>
                <td>Рік:</td> 
                <td><?= CHtml::dropDownList('year', '', Yii::app()->params['side_year_list']); ?></td> 
            </tr>
            <tr>
                <td colspan="2"> <center> 
                    <?php
                        echo CHtml::ajaxSubmitButton('Показати', '', array('type' => 'POST', 'update' => '#content'), array('class' => 'sbmt', 'type' => 'submit'));
                    ?> 
                </center> </td> 
        </tr>

        </tbody>
    </table>
    <?php echo CHtml::endForm(); ?>  
</div>