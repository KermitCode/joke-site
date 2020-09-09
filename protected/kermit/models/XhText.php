<?php

/**
 * This is the model class for table "xh_text".
 *
 * The followings are the available columns in table 'xh_text':
 * @property string $te_id
 * @property string $te_title
 * @property string $tt_id
 * @property string $te_text
 */
class XhText extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhText the static model class
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
		return 'xh_text';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('te_text', 'required'),
			array('te_title', 'length', 'max'=>100),
			array('tt_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('te_id, te_title, tt_id, te_text', 'safe', 'on'=>'search'),
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
			'te_id' => 'Te',
			'te_title' => 'Te Title',
			'tt_id' => 'Tt',
			'te_text' => 'Te Text',
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

		$criteria->compare('te_id',$this->te_id,true);
		$criteria->compare('te_title',$this->te_title,true);
		$criteria->compare('tt_id',$this->tt_id,true);
		$criteria->compare('te_text',$this->te_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}