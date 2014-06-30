<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'defaultController' => 'userpage',
        'components'=>array(
            'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=> 'userpage/error',
		),
        ),  
    )
);