<?php

/**
 * This is the model class for table "xh_system".
 *
 * The followings are the available columns in table 'xh_system':
 * @property integer $xh_system
 * @property string $adminer_pass
 * @property string $superadmin_pass
 * @property string $adtest_pass
 * @property string $no_ips
 */
class XhSystem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhSystem the static model class
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
		return 'xh_system';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xh_system', 'numerical', 'integerOnly'=>true),
			array('adminer_pass, superadmin_pass, adtest_pass', 'length', 'max'=>32),
			array('no_ips', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('xh_system, adminer_pass, superadmin_pass, adtest_pass, no_ips', 'safe', 'on'=>'search'),
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
			'xh_system' => 'Xh System',
			'adminer_pass' => 'Adminer Pass',
			'superadmin_pass' => 'Superadmin Pass',
			'adtest_pass' => 'Adtest Pass',
			'no_ips' => 'No Ips',
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

		$criteria->compare('xh_system',$this->xh_system);
		$criteria->compare('adminer_pass',$this->adminer_pass,true);
		$criteria->compare('superadmin_pass',$this->superadmin_pass,true);
		$criteria->compare('adtest_pass',$this->adtest_pass,true);
		$criteria->compare('no_ips',$this->no_ips,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}