<?php

/**
 * This is the model class for table "air".
 *
 * The followings are the available columns in table 'air':
 * @property integer $date
 * @property double $speed
 * @property double $temp
 * @property integer $direction
 * @property double $dust
 * @property double $sulfur
 */
class Air extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Air the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        public function primaryKey()
        {
            return 'date';
        }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'air';
	}

        private function isEmptyTable() {
            $sql = 'SELECT * FROM air';
            $res = Yii::app()->db->createCommand($sql)->queryAll();

            if (count($res) == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        public function getYearsList($id = NULL)
        {
            if (is_null($id)){
                $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%Y') AS y FROM air ORDER BY y DESC";
            }
            else {
                $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%Y') AS y FROM air WHERE air.marker_id = ".$id." ORDER BY y DESC";
            }
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $years = Yii::app()->db->createCommand($sql)->queryColumn();
            return array_combine($years, $years);
        }

        private function pickMonth(array $m_labels, array $to_pick)
        {
            $result = array();
            foreach ($to_pick as $key){
                $result[]=$m_labels[$key-1];
            }
            return $result;
        }

        public function getMonthsList($id = NULL)
        {
            $month_labels = array('Січень', 'Лютий', 'Березень', 'Квітень', 'Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');

            if (is_null($id)){
                $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%c') AS m FROM air ORDER BY m ASC";
            }
            else {
                $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%c') AS m FROM air WHERE air.marker_id = ".$id." ORDER BY m ASC";
            }
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $months = Yii::app()->db->createCommand($sql)->queryColumn();
            return array_combine($months, $this->pickMonth($month_labels, $months));
        }

        public function getTableData($month = NULL, $year = NULL){
            if (is_null($month) && is_null($year)) {
                $sql = 'SELECT * FROM air ORDER BY date DESC';
            } else{
                $sql = "SELECT * FROM air WHERE FROM_UNIXTIME(date, '%c') = ".$month." AND FROM_UNIXTIME(date, '%Y') = ".$year." ORDER BY date DESC";
            }
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());
            
            return new CSqlDataProvider($sql, array(
                'totalItemCount' => $count_r,
                'pagination'=>false,
                'sort'=>array(
                    'attributes'=>array(
                        'date, speed, temp, direction, dust, sulfur'
                    )
                )             
            ));
        }

        public function getMarkerTableData($id, $month = NULL, $year = NULL)
        {
            if (is_null($month) && is_null($year)){
                $sql = 'SELECT * FROM air WHERE marker_id = '.$id.' ORDER BY date DESC';
            } else {
                $sql = "SELECT * FROM air WHERE marker_id = ".$id." AND FROM_UNIXTIME(date, '%c') = ".$month." AND FROM_UNIXTIME(date, '%Y') = ".$year." ORDER BY date DESC";
            }
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());
            
            return new CSqlDataProvider($sql, array(
                'totalItemCount' => $count_r,
                'pagination'=>false,
                'sort'=>array(
                    'attributes'=>array(
                        'date, speed, temp, direction, dust, sulfur'
                    )
                )             
            ));    
        }
        
        public function getData(array $fields, $sdt, $edt)
        {
            $f = implode(',', $fields);
            $sql = 'SELECT date,'.$f.' FROM air WHERE 
                date BETWEEN '.$sdt.' AND '.$edt;
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $sql_res = Yii::app()->db->createCommand($sql)->queryAll();
            
            $result = array();
            $a = $this->attributeLabels(FALSE);
            
            foreach ($fields as $field) {
               $tmp = array();
               $tmp['name'] = $a[$field];
               foreach ($sql_res as $row) {
                   $tmp['data'][] = array( (int)$row['date'], (float)$row[$field]);
               } 
               
               $result[] = $tmp;
            }
            
            return $result;
        }

        public function getMarkerData($id, array $fields, $sdt, $edt)
        {
            $f = implode(',', $fields);
            
            $sql = 'SELECT date,'.$f.' FROM air WHERE marker_id = '.$id.' AND 
                date BETWEEN '.$sdt.' AND '.$edt;
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `air` пуста!!!'));
            }
            
            $sql_res = Yii::app()->db->createCommand($sql)->queryAll();
            
            $result = array();
            $a = $this->attributeLabels(FALSE);
            
            foreach ($fields as $field) {
               $tmp = array();
               $tmp['name'] = $a[$field];
               foreach ($sql_res as $row) {
                   $tmp['data'][] = array( (int)$row['date'], (float)$row[$field]);
               } 
               
               $result[] = $tmp;
            }
            
            return $result;

        }
        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('speed, temp, direction, dust, sulfur', 'required'),
			array('marker_id, direction', 'numerical', 'integerOnly'=>true),
			array('speed, temp, dust, sulfur', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('date, marker_id, speed, temp, direction, dust, sulfur', 'safe', 'on'=>'search'),
		);
	}

        public function beforeSave() {
            
            if (isset($_POST['date'])) {
            
            if ($_POST['date'] == '') {
                $this->date = time();
            } else {
                $this->date = strtotime($_POST['date']);
            }
        }


            return parent::beforeSave();
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels($with_pk = TRUE)
	{
            if ($with_pk){ 
		return array(
			'date' => 'Дата',
			'speed' => 'Швидкість',
			'temp' => 'Температуа',
			'direction' => 'Напрям',
			'dust' => 'Вологість',
			'sulfur' => 'Діоксид сірки',
		);
            } else {
                return array(
			'speed' => 'Швидкість',
			'temp' => 'Температуа',
			'direction' => 'Напрям',
			'dust' => 'Вологість',
			'sulfur' => 'Діоксид сірки',
		);
            }
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('date',$this->date);
		$criteria->compare('speed',$this->speed);
		$criteria->compare('temp',$this->temp);
		$criteria->compare('direction',$this->direction);
		$criteria->compare('dust',$this->dust);
		$criteria->compare('sulfur',$this->sulfur);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}