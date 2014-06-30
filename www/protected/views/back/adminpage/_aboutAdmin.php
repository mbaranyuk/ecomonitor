<? Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/back/admin.css'); ?>

<div id="aboutAdmin">
    <div id="leftBlockContainer">
        <div id="leftBlock">
            <div class="blBody">
                <div class="blContentAvatar">
                    <div id="uNick"> <?= $admin->login; ?> </div>
                    <div align="center">
                        <div id="uPhotoBlock" class="uPhotoBlock">
                            <div id="uAvatar" align="center">
                                <img id="profPhotoSrc" src="data:image/png;base64,<?= base64_encode($admin->photo);?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
            </div>
        </div>
    </div>

    <div id="centerTopBlock">
        <div id="profileTitle"> <?= $admin->name; ?> </div>
    </div>

    <div id="centerBlock">
        <div id="centerBlockContainer">
            <div id="contentBlock">
                <div class="blTitle infoBlockTitle">
                    Загальна інформація
                </div>

                <table width="100%" cellspacing="0" cellpadding="4" border="0">
                    <tbody>
                        <tr>
                        <td class="infoPageText" width="30%">Ім'я:</td>
                        <td class="infoPageValue" width="60%"> <?= $admin->name; ?> </td>
                        </tr>
                        <tr>
                        <td class="infoPageText">Посада:</td>
                        <td class="infoPageValue"><?= $admin->rank; ?></td>
                        </tr>
                        <tr>
                        <td class="infoPageText">Місце роботи:</td>
                        <td class="infoPageValue"><?= $admin->work; ?></td>
                        </tr>
                        <tr>
                        <td class="infoPageText">Логін:</td>
                        <td class="infoPageValue"> <b> <?= $admin->login; ?> </b></td>
                        </tr>
                        <tr>
                        <td class="infoPageText">Пароль:</td>
                        <td class="infoPageValue"> <b><?= $admin->pass; ?> </b></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="blTitle infoBlockTitle">
                    Контактна інформація
                </div>
                <table width="100%" cellspacing="0" cellpadding="4" border="0">
                    <tbody>
                        <tr>
                        <td class="infoPageText" width="30%">E-mail адрес:</td>
                        <td class="infoPageValue" width="60%">
                            <b><?= $admin->email; ?></b>
                        </td>
                        </tr>
                        <tr>
                        <td class="infoPageText" width="30%">Телефон:</td>
                        <td class="infoPageValue" width="60%">
                            <b><?= $admin->tel; ?></b>
                        </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="blTitle infoBlockTitle">
                    Управління профілем
                </div>
                <table width="100%" cellspacing="0" cellpadding="4" border="0">
                    <tbody>
                        <tr>
                            <td class="infoPageText" width="30%"><?=  CHtml::link('Редагувати', array('update')); ?></td>        
                        </tr>
                        <tr>
                        <td class="infoPageText" width="30%"><?=  CHtml::link('Видалити','#' ,array('submit'=>array('delete'),'confirm'=>'Ви дійсно бажаєте видалити профіль?')); ?></td>        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>