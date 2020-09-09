<?php

/**
 * This is the model class for table "xh_sprider".
 *
 * The followings are the available columns in table 'xh_sprider':
 * @property integer $id
 * @property string $sprider
 * @property string $cometime
 */
class XhSprider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhSprider the static model class
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
		return 'xh_sprider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sprider', 'length', 'max'=>15),
			array('cometime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sprider, cometime', 'safe', 'on'=>'search'),
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
			'sprider' => 'Sprider',
			'cometime' => 'Cometime',
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
		$criteria->compare('sprider',$this->sprider,true);
		$criteria->compare('cometime',$this->cometime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}