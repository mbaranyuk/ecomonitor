<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $name
 * @property string $rank
 * @property string $work
 * @property string $photo
 * @property string $login
 * @property string $pass
 * @property string $email
 * @property string $tel
 */
class Admin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
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
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, rank, work, login, pass', 'required'),
			array('name', 'length', 'max'=>200),
			array('login, pass, email, tel', 'length', 'max'=>50),
			array('photo', 'safe'),
                        array('photo', 'file', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, rank, work, photo, login, pass, email, tel', 'safe', 'on'=>'search'),
		);
	}

        public function getAdminInfo($id)
        {
            return $this->findByPk($id);
        }

        public function beforeSave() {
            if ($file = CUploadedFile::getInstance($this, 'photo')) {
                $this->photo = file_get_contents($file->tempName);
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
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'rank' => 'Rank',
			'work' => 'Work',
			'photo' => 'Photo',
			'login' => 'Login',
			'pass' => 'Pass',
			'email' => 'Email',
			'tel' => 'Tel',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('rank',$this->rank,true);
		$criteria->compare('work',$this->work,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tel',$this->tel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}