<?php

return CMap::mergeArray(
                require_once(dirname(__FILE__) . '/main.php'), array(
             'modules' => array(
                 'dash',
            ),
            // стандартный контроллер
            'defaultController' => 'adminpage',
            // компоненты
            'components' => array(
                // пользователь
                'user' => array(
                    'loginUrl' => array('/adminpage/login'),
                ),
            ),
     )
);
?>