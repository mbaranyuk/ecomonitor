<?php
class BackEndController extends CController
{
    public $layout='column1';
    public $menu = array(
//        'items' => array(
//            array('url' => array('/userpage/about'),
//                'label' => '?',
//            ),
//            array('url'=>'/admin.php', 
//		'label'=>'Вхід',
//            ),
//        )
    );
    public $breadcrumbs=array();
 
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
 
    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
                'actions'=>array('login'),
            ),
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
}