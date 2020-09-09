<?php

/**
 * This is the model class for table "xh_pinglun".
 *
 * The followings are the available columns in table 'xh_pinglun':
 * @property string $pl_id
 * @property integer $pl_type
 * @property string $pl_tt_id
 * @property string $pl_author
 * @property string $pl_text
 * @property string $pl_time
 * @property integer $pl_visible
 */
class XhPinglun extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhPinglun the static model class
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
		return 'xh_pinglun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pl_type, pl_visible', 'numerical', 'integerOnly'=>true),
			array('pl_tt_id, pl_time', 'length', 'max'=>10),
			array('pl_author', 'length', 'max'=>15),
			array('pl_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pl_id, pl_type, pl_tt_id, pl_author, pl_text, pl_time, pl_visible', 'safe', 'on'=>'search'),
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
			'pl_id' => 'Pl',
			'pl_type' => 'Pl Type',
			'pl_tt_id' => 'Pl Tt',
			'pl_author' => 'Pl Author',
			'pl_text' => 'Pl Text',
			'pl_time' => 'Pl Time',
			'pl_visible' => 'Pl Visible',
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

		$criteria->compare('pl_id',$this->pl_id,true);
		$criteria->compare('pl_type',$this->pl_type);
		$criteria->compare('pl_tt_id',$this->pl_tt_id,true);
		$criteria->compare('pl_author',$this->pl_author,true);
		$criteria->compare('pl_text',$this->pl_text,true);
		$criteria->compare('pl_time',$this->pl_time,true);
		$criteria->compare('pl_visible',$this->pl_visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}