<?php

/**
 * This is the model class for table "xh_errors".
 *
 * The followings are the available columns in table 'xh_errors':
 * @property integer $id
 * @property string $jin_ip
 * @property string $jin_say
 * @property string $jin_user
 * @property string $jin_time
 */
class XhErrors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhErrors the static model class
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
		return 'xh_errors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jin_user', 'required'),
			array('jin_ip', 'length', 'max'=>22),
			array('jin_say, jin_user', 'length', 'max'=>255),
			array('jin_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, jin_ip, jin_say, jin_user, jin_time', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jin_ip' => 'Jin Ip',
			'jin_say' => 'Jin Say',
			'jin_user' => 'Jin User',
			'jin_time' => 'Jin Time',
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
		$criteria->compare('jin_ip',$this->jin_ip,true);
		$criteria->compare('jin_say',$this->jin_say,true);
		$criteria->compare('jin_user',$this->jin_user,true);
		$criteria->compare('jin_time',$this->jin_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}