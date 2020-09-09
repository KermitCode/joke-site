<?php

/**
 * This is the model class for table "xh_user".
 *
 * The followings are the available columns in table 'xh_user':
 * @property string $er_id
 * @property string $er_name
 * @property string $er_password
 * @property integer $er_qq
 * @property string $er_sex
 * @property string $er_ip
 * @property string $er_gotime
 * @property string $er_lasttime
 * @property integer $er_status
 * @property string $er_xh_word
 * @property string $er_xh_image
 * @property string $er_money
 */
class XhUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhUser the static model class
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
		return 'xh_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('er_name, er_password, er_ip', 'required'),
			array('er_qq, er_status', 'numerical', 'integerOnly'=>true),
			array('er_name, er_ip', 'length', 'max'=>15),
			array('er_password', 'length', 'max'=>32),
			array('er_sex', 'length', 'max'=>2),
			array('er_gotime, er_lasttime, er_xh_word, er_xh_image, er_money', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('er_id, er_name, er_password, er_qq, er_sex, er_ip, er_gotime, er_lasttime, er_status, er_xh_word, er_xh_image, er_money', 'safe', 'on'=>'search'),
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
			'er_id' => 'Er',
			'er_name' => 'Er Name',
			'er_password' => 'Er Password',
			'er_qq' => 'Er Qq',
			'er_sex' => 'Er Sex',
			'er_ip' => 'Er Ip',
			'er_gotime' => 'Er Gotime',
			'er_lasttime' => 'Er Lasttime',
			'er_status' => 'Er Status',
			'er_xh_word' => 'Er Xh Word',
			'er_xh_image' => 'Er Xh Image',
			'er_money' => 'Er Money',
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

		$criteria->compare('er_id',$this->er_id,true);
		$criteria->compare('er_name',$this->er_name,true);
		$criteria->compare('er_password',$this->er_password,true);
		$criteria->compare('er_qq',$this->er_qq);
		$criteria->compare('er_sex',$this->er_sex,true);
		$criteria->compare('er_ip',$this->er_ip,true);
		$criteria->compare('er_gotime',$this->er_gotime,true);
		$criteria->compare('er_lasttime',$this->er_lasttime,true);
		$criteria->compare('er_status',$this->er_status);
		$criteria->compare('er_xh_word',$this->er_xh_word,true);
		$criteria->compare('er_xh_image',$this->er_xh_image,true);
		$criteria->compare('er_money',$this->er_money,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}