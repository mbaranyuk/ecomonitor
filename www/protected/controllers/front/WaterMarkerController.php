<?php

class WaterMarkerController extends Controller {

    public $layout = '//layouts/with_sidebar';
    public $defaultAction = 'TableData';
    public $marker_id = NULL;

    public function actionTableData() {

        $this->marker_id = CHtml::encode(Yii::app()->request->getParam('id', 1));
        $marker = Checkpoints::model()->findByPk($this->marker_id);

        if (Yii::app()->request->isAjaxRequest) {

            $mon = CHtml::encode(Yii::app()->request->getParam('month'));
            $year = CHtml::encode(Yii::app()->request->getParam('year'));

            $this->renderPartial('tableData', array('marker' => $marker,
                'dataProvider' => Water::model()->getMarkerTableData($this->marker_id, $mon, $year)), FALSE, TRUE);
            Yii::app()->end();
        } else {
            Yii::app()->params['side_labels'] = Water::model()->attributeLabels(FALSE);
            Yii::app()->params['side_year_list'] = Water::model()->getYearsList($this->marker_id);
            Yii::app()->params['side_month_list'] = Water::model()->getMonthsList($this->marker_id);

            $this->render('tableData', array('marker' => $marker,
                'dataProvider' => Water::model()->getMarkerTableData($this->marker_id)));
        }
    }

    public function actionChartData() {

        if (Yii::app()->request->isAjaxRequest) {

            $s_date = strtotime(CHtml::encode(Yii::app()->request->getParam('start_date')));
            $e_date = strtotime(CHtml::encode(Yii::app()->request->getParam('end_date')));
            $f1 = CHtml::encode(Yii::app()->request->getParam('field'));
            $id = CHtml::encode(Yii::app()->request->getParam('id'));

            $data = Water::model()->getMarkerData($id, array($f1), $s_date, $e_date);
            $marker = Checkpoints::model()->findByPk($id);

            $this->renderPartial('chartData', array('marker' => $marker, 'data' => $data), FALSE, TRUE);
            Yii::app()->end();
        }
    }

    public function actionChartMultiData() {

        if (Yii::app()->request->isAjaxRequest) {

            $s_date = strtotime(CHtml::encode(Yii::app()->request->getParam('start_date2')));
            $e_date = strtotime(CHtml::encode(Yii::app()->request->getParam('end_date2')));
            $f1 = CHtml::encode(Yii::app()->request->getParam('field'));
            $f2 = CHtml::encode(Yii::app()->request->getParam('field2'));
            $id = CHtml::encode(Yii::app()->request->getParam('id'));

            $data = Water::model()->getMarkerData($id, array($f1, $f2), $s_date, $e_date);
            $marker = Checkpoints::model()->findByPk($id);

            $this->renderPartial('chartData', array('marker' => $marker, 'data' => $data), FALSE, TRUE);
            Yii::app()->end();
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