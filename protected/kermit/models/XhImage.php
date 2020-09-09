<?php

/**
 * This is the model class for table "xh_image".
 *
 * The followings are the available columns in table 'xh_image':
 * @property string $im_id
 * @property string $cl_id
 * @property string $im_title
 * @property string $im_mainimg
 * @property string $img_urls
 * @property string $im_time
 * @property string $im_source
 * @property string $im_author
 * @property string $im_views
 * @property string $im_showviews
 * @property string $im_voters_up
 * @property string $im_voters_down
 * @property string $im_comments
 * @property string $im_score
 * @property integer $im_baoxiao
 * @property integer $im_visible
 * @property integer $publiced
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
			array('im_baoxiao, im_visible, publiced', 'numerical', 'integerOnly'=>true),
			array('cl_id', 'length', 'max'=>8),
			array('im_mainimg, im_source', 'length', 'max'=>50),
			array('im_time, im_views, im_showviews, im_voters_up, im_voters_down, im_comments, im_score', 'length', 'max'=>10),
			array('im_author', 'length', 'max'=>20),
			array('im_title, img_urls', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('im_id, cl_id, im_title, im_mainimg, img_urls, im_time, im_source, im_author, im_views, im_showviews, im_voters_up, im_voters_down, im_comments, im_score, im_baoxiao, im_visible, publiced', 'safe', 'on'=>'search'),
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
			'im_id' => '笑话ID',
			'cl_id' => '图片笑话类别：',
			'im_title' => '图片笑话主标题：',
			'im_mainimg' => '主缩略图：',
			'img_urls' => '图片列表：',
			'im_time' => '发布时间：',
			'im_source' => '笑话来源：',
			'im_author' => '发布作者：',
			'im_views' => '实际展示次数：',
			'im_showviews' => '显示展示次数：',
			'im_voters_up' => '顶数：',
			'im_voters_down' => '踩数：',
			'im_comments' => '评论数：',
			'im_score' => '得分：',
			'im_baoxiao' => '是否爆笑：',
			'im_visible' => '是否显示：',
			'publiced' => '是否已发布：',
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
		$criteria->compare('im_mainimg',$this->im_mainimg,true);
		$criteria->compare('img_urls',$this->img_urls,true);
		$criteria->compare('im_time',$this->im_time,true);
		$criteria->compare('im_source',$this->im_source,true);
		$criteria->compare('im_author',$this->im_author,true);
		$criteria->compare('im_views',$this->im_views,true);
		$criteria->compare('im_showviews',$this->im_showviews,true);
		$criteria->compare('im_voters_up',$this->im_voters_up,true);
		$criteria->compare('im_voters_down',$this->im_voters_down,true);
		$criteria->compare('im_comments',$this->im_comments,true);
		$criteria->compare('im_score',$this->im_score,true);
		$criteria->compare('im_baoxiao',$this->im_baoxiao);
		$criteria->compare('im_visible',$this->im_visible);
		$criteria->compare('publiced',$this->publiced);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}