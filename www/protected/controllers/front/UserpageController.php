<?php

class UserpageController extends Controller {

    public $layout = '//layouts/fullpage'; 
    
    public function actionIndex() {

        Yii::import('ext.egmap.*');

//        $model = new MapRegions();
//        $arr = $model->findAll();
//
//        $poligons = array();
//
//        foreach ($arr as $one) {
//            $str_coord_arr = explode("\n", $one->coord);
//            $Mapcoords = array();
//
//            foreach ($str_coord_arr as $coord) {
//                list($long, $lat) = explode(",", $coord);
//                $Mapcoords[] = new EGMapCoord(floatval($lat), floatval($long));
//            }
//
//            $poligons[] = new EGMapPolygon($Mapcoords, array(
//                'fillColor'=>$one->color,
//                'strokeColor'=>$one->color
//            ));
//           
//        }     
//        
//        $this->render('index', array('poligons'=>$poligons));

        $model = new Checkpoints();
        $arr = $model->findAll();
        
        $types = PointType::model()->getTypes();        
        
        $points = array();
        foreach ($arr as $one) {

            switch ($one->type) {
                case 'air':
                    $link =  CHtml::link('Детальніше', array('AirMarker/', 'id' => $one->id));
                    break;
                
                case 'water':
                    $link =  CHtml::link('Детальніше', array('WaterMarker/', 'id' => $one->id));
                    break;
            }
            
            $info = new EGMapInfoWindow(
                    '<h3>' . $types[$one->type] . ' №' . $one->id . '</h3>' .
                    $link);

            $marker = new EGMapMarker($one->latitude, $one->longitude, array(
                'title' => $types[$one->type]));
            $marker->addHtmlInfoWindow($info);

            $points[] = $marker;
        }


        $this->render('index', array('markers' => $points));
    }

//    public function actionMapPoligons() {
//        $model = new MapRegions();
//        $arr = $model->findAll();
//
//        $poligons = array();
//
//        foreach ($arr as $one) {
//            $str_coord_arr = explode("\n", $one->coord);
//            $Mapcoords = array();
//
//            foreach ($str_coord_arr as $coord) {
//                list($long, $lat) = explode(",", $coord);
//                $Mapcoords[] = array(floatval($long), floatval($lat));
//            }
//
//            $poligons[] = $Mapcoords;
//        }
//
//        $r = array(
//            'type'=>'MultiPolygon',
//            'coordinates'=>array($poligons)
//        );
//        
//        $this->layout = false;
//        header('Content-type: application/json');
//        echo CJSON::encode($r);
//       //print_r($poligons);
//        Yii::app()->end();
//    }

    
//    public function actionAir() {
//        $this->layout = 'with_sidebar';
//        
//        $model = new Air();
//        Yii::app()->params['side_labels'] = $model->attributeLabels(FALSE);
//
//        Yii::app()->params['side_year_list'] = $model->getYearsList();
//        Yii::app()->params['side_month_list'] = $model->getMonthsList();
//        
//        if(Yii::app()->request->isAjaxRequest){
//            
//             $mon = CHtml::encode(Yii::app()->request->getPost('month'));
//             $year = CHtml::encode(Yii::app()->request->getPost('year'));
//
//             $this->renderPartial('_air_table', array(
//                'dataProvider' => $model->getTableData($mon, $year)
//             ));
//            Yii::app()->end();
//            
//        } else{
//            $this->render('air', array('dataProvider' => $model->getTableData()));
//        }
//    }
//
//    public function actionWater() {
//        $this->layout = 'with_sidebar';
//        
//        $model = new Water();
//        Yii::app()->params['side_labels'] = $model->attributeLabels(FALSE);
//
//        Yii::app()->params['side_year_list'] = $model->getYearsList();
//        Yii::app()->params['side_month_list'] = $model->getMonthsList();
//        
//        if(Yii::app()->request->isAjaxRequest){
//            
//             $mon = CHtml::encode(Yii::app()->request->getPost('month'));
//             $year = CHtml::encode(Yii::app()->request->getPost('year'));
//
//             $this->renderPartial('_water_table', array(
//                'dataProvider' => $model->getTableData($mon, $year)
//             ));
//            Yii::app()->end();
//            
//        } else{
//            $this->render('water', array('dataProvider' => $model->getTableData()));
//        }
//    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('/userpage/error', $error);
        }
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}