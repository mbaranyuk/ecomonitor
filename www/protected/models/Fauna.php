<?php

/**
 * This is the model class for table "flora".
 *
 * The followings are the available columns in table 'flora':
 * @property integer $date
 * @property integer $olen
 * @property integer $vedmid
 * @property integer $rys
 * @property integer $gluhar
 * @property integer $forel
 * @property integer $salamandra
 */
class Fauna extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Flora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fauna';
	}

        private function isEmptyTable() {
            $sql = 'SELECT * FROM fauna';
            $res = Yii::app()->db->createCommand($sql)->queryAll();

            if (count($res) == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        public function getYearsList()
        {        
            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%Y') AS y FROM fauna ORDER BY y DESC";
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `fauna` пуста!!!'));
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

        public function getMonthsList()
        {
            $month_labels = array('Січень', 'Лютий', 'Березень', 'Квітень', 'Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');

            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%c') AS m FROM fauna ORDER BY m ASC";
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `fauna` пуста!!!'));
            }
            
            $months = Yii::app()->db->createCommand($sql)->queryColumn();
            return array_combine($months, $this->pickMonth($month_labels, $months));
        }

        public function getTableData($month = NULL, $year = NULL){
            if (is_null($month) && is_null($year)) {
                $sql = 'SELECT * FROM fauna ORDER BY date DESC';
            } else{
                $sql = "SELECT * FROM fauna WHERE FROM_UNIXTIME(date, '%c') = ".$month." AND FROM_UNIXTIME(date, '%Y') = ".$year." ORDER BY date DESC";
            }
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `fauna` пуста!!!'));
            }
            
            $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());
            
            return new CSqlDataProvider($sql, array(
                'totalItemCount' => $count_r,
                'pagination'=>false,
                'sort'=>array(
                    'attributes'=>array(
                        'date, olen, vedmid, rys, gluhar, forel, salamandra'
                    )
                )             
            ));
        }
        
        public function getData(array $fields, $sdt, $edt)
        {
            $f = implode(',', $fields);
            $sql = 'SELECT date,'.$f.' FROM fauna WHERE 
                date BETWEEN '.$sdt.' AND '.$edt;
            
            if ($this->isEmptyTable()) {
                throw new CException(yii::t(Yii::app()->name, 'Таблиця `fauna` пуста!!!'));
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
//			array('date', 'required'),
			array('date, olen, vedmid, rys, gluhar, forel, salamandra', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('date, olen, vedmid, rys, gluhar, forel, salamandra', 'safe', 'on'=>'search'),
		);
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            if ($with_pk){ 
		return array(
			'date' => 'Дата',
			'olen' => 'Олень благородний',
			'vedmid' => 'Ведмідь бурий',
			'rys' => 'Рись',
			'gluhar' => 'Глухар',
			'forel' => 'Форель',
			'salamandra' => 'Саламандра',
		);
            } else {
                return array(
			'olen' => 'Олень благородний',
			'vedmid' => 'Ведмідь бурий',
			'rys' => 'Рись',
			'gluhar' => 'Глухар',
			'forel' => 'Форель',
			'salamandra' => 'Саламандра',
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
		$criteria->compare('olen',$this->olen);
		$criteria->compare('vedmid',$this->vedmid);
		$criteria->compare('rys',$this->rys);
		$criteria->compare('gluhar',$this->gluhar);
		$criteria->compare('forel',$this->forel);
		$criteria->compare('salamandra',$this->salamandra);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}