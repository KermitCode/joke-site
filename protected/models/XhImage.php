<?php

/**
 * This is the model class for table "xh_image".
 *
 * The followings are the available columns in table 'xh_image':
 * @property string $im_id
 * @property string $cl_id
 * @property string $im_title
 * @property string $im_source
 * @property string $im_author
 * @property string $im_time
 * @property string $im_says
 * @property string $im_imgs
 * @property string $im_views
 * @property string $im_showviews
 * @property string $im_voters_up
 * @property string $im_voters_down
 * @property string $im_comments
 * @property string $im_score
 * @property integer $im_baoxiao
 */
class XhImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhImage the static model class
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
		return 'xh_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cl_id', 'required'),
			array('im_baoxiao', 'numerical', 'integerOnly'=>true),
			array('cl_id, im_time, im_views, im_showviews, im_voters_up, im_voters_down, im_comments', 'length', 'max'=>10),
			array('im_title, im_source, im_author', 'length', 'max'=>50),
			array('im_score', 'length', 'max'=>11),
			array('im_says, im_imgs', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('im_id, cl_id, im_title, im_source, im_author, im_time, im_says, im_imgs, im_views, im_showviews, im_voters_up, im_voters_down, im_comments, im_score, im_baoxiao', 'safe', 'on'=>'search'),
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
			'im_id' => 'Im',
			'cl_id' => 'Cl',
			'im_title' => 'Im Title',
			'im_source' => 'Im Source',
			'im_author' => 'Im Author',
			'im_time' => 'Im Time',
			'im_says' => 'Im Says',
			'im_imgs' => 'Im Imgs',
			'im_views' => 'Im Views',
			'im_showviews' => 'Im Showviews',
			'im_voters_up' => 'Im Voters Up',
			'im_voters_down' => 'Im Voters Down',
			'im_comments' => 'Im Comments',
			'im_score' => 'Im Score',
			'im_baoxiao' => 'Im Baoxiao',
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

		$criteria->compare('im_id',$this->im_id,true);
		$criteria->compare('cl_id',$this->cl_id,true);
		$criteria->compare('im_title',$this->im_title,true);
		$criteria->compare('im_source',$this->im_source,true);
		$criteria->compare('im_author',$this->im_author,true);
		$criteria->compare('im_time',$this->im_time,true);
		$criteria->compare('im_says',$this->im_says,true);
		$criteria->compare('im_imgs',$this->im_imgs,true);
		$criteria->compare('im_views',$this->im_views,true);
		$criteria->compare('im_showviews',$this->im_showviews,true);
		$criteria->compare('im_voters_up',$this->im_voters_up,true);
		$criteria->compare('im_voters_down',$this->im_voters_down,true);
		$criteria->compare('im_comments',$this->im_comments,true);
		$criteria->compare('im_score',$this->im_score,true);
		$criteria->compare('im_baoxiao',$this->im_baoxiao);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}