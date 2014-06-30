<? Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/front/sidebar.css'); ?>

<div class="sidebar_form" id="table_f">
    <?php echo CHtml::form('', 'POST'); ?>
    <div class="form_caption"> Таблиця спостережень за забрудненням показників  </div>
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
                <td colspan="2"> <center> <?=
            CHtml::ajaxSubmitButton('Показати', '', array('type' => 'POST', 'update'=>'#data_table'), array('class' => 'sbmt', 'type' => 'submit'));
            ?> 
        </center> </td> 
        </tr>

        </tbody>
    </table>
<?php echo CHtml::endForm(); ?>  
</div>