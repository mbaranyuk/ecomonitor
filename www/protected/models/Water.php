<?php

/**
 * This is the model class for table "water".
 *
 * The followings are the available columns in table 'water':
 * @property integer $date
 * @property double $temp
 * @property double $iron
 * @property double $calcium
 */
class Water extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Water the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return 'date';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'water';
    }

    private function isEmptyTable() {
        $sql = 'SELECT * FROM water';
        $res = Yii::app()->db->createCommand($sql)->queryAll();

        if (count($res) == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getYearsList($id = NULL) {
        if (is_null($id)) {
            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%Y') AS y FROM water ORDER BY y DESC";
        } else {
            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%Y') AS y FROM water WHERE marker_id = " . $id . " ORDER BY y DESC";
        }
        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
        }
        
        $years = Yii::app()->db->createCommand($sql)->queryColumn();

        return array_combine($years, $years);
    }

    private function pickMonth(array $m_labels, array $to_pick) {
        $result = array();
        foreach ($to_pick as $key) {
            $result[] = $m_labels[$key - 1];
        }
        return $result;
    }

    public function getMonthsList($id = NULL) {
        $month_labels = array('Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень');

        if (is_null($id)) {
            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%c') AS m FROM water ORDER BY m ASC";
        } else {
            $sql = "SELECT DISTINCT FROM_UNIXTIME(date, '%c') AS m FROM water WHERE marker_id = " . $id . " ORDER BY m ASC";
        }

        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
        }
        $months = Yii::app()->db->createCommand($sql)->queryColumn();
        return array_combine($months, $this->pickMonth($month_labels, $months));
    }

    public function getTableData($month = NULL, $year = NULL) {
        if (is_null($month) && is_null($year)) {
            $sql = 'SELECT * FROM water ORDER BY date DESC';
        } else {
            $sql = "SELECT * FROM water WHERE FROM_UNIXTIME(date, '%c') = " . $month . " AND FROM_UNIXTIME(date, '%Y') = " . $year . " ORDER BY date DESC";
        }
        
        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
        }
        $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => $count_r,
            'pagination'=>false,
            'sort' => array(
                'attributes' => array(
                    'date, temp, iron, calcium'
                )
            )
        ));
    }

    public function getMarkerTableData($id, $month = NULL, $year = NULL) {
        if (is_null($month) && is_null($year)) {
            $sql = 'SELECT * FROM water WHERE marker_id = ' . $id . ' ORDER BY date DESC';
        } else {
            $sql = "SELECT * FROM water WHERE marker_id = " . $id . " AND FROM_UNIXTIME(date, '%c') = " . $month . " AND FROM_UNIXTIME(date, '%Y') = " . $year . " ORDER BY date DESC";
        }

        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
        }
        
        $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => $count_r,
            'pagination'=>false,
            'sort' => array(
                'attributes' => array(
                    'date, temp, iron, calcium'
                )
            )
        ));
    }
    
    public function getData(array $fields, $sdt, $edt)
    {
        $f = implode(',', $fields);
        $sql = 'SELECT date,'.$f.' FROM water WHERE 
            date BETWEEN '.$sdt.' AND '.$edt;

        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
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

    public function getMarkerData($id, array $fields, $sdt, $edt) {
        $f = implode(',', $fields);

        $sql = 'SELECT date,' . $f . ' FROM water WHERE marker_id = ' . $id . ' AND 
                date BETWEEN ' . $sdt . ' AND ' . $edt;

        if ($this->isEmptyTable()) {
            throw new CException(yii::t(Yii::app()->name, 'Таблиця `water` пуста!!!'));
        }
        
        $sql_res = Yii::app()->db->createCommand($sql)->queryAll();

        $result = array();
        $a = $this->attributeLabels(FALSE);

        foreach ($fields as $field) {
            $tmp = array();
            $tmp['name'] = $a[$field];
            foreach ($sql_res as $row) {
                $tmp['data'][] = array((int) $row['date'], (float) $row[$field]);
            }

            $result[] = $tmp;
        }

        return $result;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('temp, iron, calcium', 'required'),
            array('marker_id', 'numerical', 'integerOnly' => true),
            array('temp, iron, calcium', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('date, marker_id, temp, iron, calcium', 'safe', 'on' => 'search'),
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
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels($with_pk = TRUE) {
        if ($with_pk) {
            return array(
                'date' => 'Дата',
                'temp' => 'Температура',
                'iron' => 'Вміст заліза',
                'calcium' => 'Вміст кальцію',
            );
        } else {
            return array(
                'temp' => 'Температура',
                'iron' => 'Вміст заліза',
                'calcium' => 'Вміст кальцію',
            );
        }
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('date', $this->date);
        $criteria->compare('temp', $this->temp);
        $criteria->compare('iron', $this->iron);
        $criteria->compare('calcium', $this->calcium);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}