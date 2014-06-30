<?php

/**
 * This is the model class for table "checkpoints".
 *
 * The followings are the available columns in table 'checkpoints':
 * @property integer $id
 * @property string $type
 * @property string $unic_name
 * @property double $latitude
 * @property double $longitude
 */
class Checkpoints extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Checkpoints the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'checkpoints';
    }

    public function getTableData($id, $type) {
        $sql = 'SELECT * FROM '. $type .' 
                WHERE '.$type.'.marker_id = "'.$id.'"';

        $count_r = count(Yii::app()->db->createCommand($sql)->queryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => $count_r,
            'pagination'=>false,
        ));
    }
    
    public function getData($id, $type, $field)
    {
         $sql = 'SELECT date, '. $field .' FROM '. $type .'
                 WHERE '.$type.'.marker_id = "'.$id.'"';
        
    }
    
    public function getMultiplyData($id, $type, $field, $field2)
    {
        $sql = 'SELECT date, '. $field .', '. $field2 .' FROM '.$type.'
                WHERE '.$type.'.marker_id = "'.$id.'"';
        
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, unic_name, latitude, longitude', 'required'),
            array('id', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('type, unic_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, type, unic_name, about, latitude, longitude', 'safe', 'on' => 'search'),
        );
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
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type' => 'Type',
            'unic_name' => 'Unic Name',
            'about' => 'About',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('unic_name', $this->unic_name, true);
        $criteria->compare('about', $this->about, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}