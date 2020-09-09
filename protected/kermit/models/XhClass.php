<?php

/**
 * This is the model class for table "xh_class".
 *
 * The followings are the available columns in table 'xh_class':
 * @property string $cl_id
 * @property integer $cl_type
 * @property string $cl_name
 * @property string $cl_order
 * @property string $cl_description
 * @property string $cl_articles
 */
class XhClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhClass the static model class
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
		return 'xh_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cl_type,cl_time', 'numerical', 'integerOnly'=>true),
			array('cl_name', 'length', 'max'=>50),
			array('cl_order, cl_articles', 'length', 'max'=>10),
			array('cl_description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cl_id, cl_type, cl_name, cl_order, cl_description, cl_articles', 'safe', 'on'=>'search'),
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
			'cl_id' => 'Cl',
			'cl_type' => 'Cl Type',
			'cl_name' => 'Cl Name',
			'cl_order' => 'Cl Order',
			'cl_description' => 'Cl Description',
			'cl_articles' => 'Cl Articles',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

}