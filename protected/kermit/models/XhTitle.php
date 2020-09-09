<?php

/**
 * This is the model class for table "xh_title".
 *
 * The followings are the available columns in table 'xh_title':
 * @property string $tt_id
 * @property string $cl_id
 * @property string $tt_title
 * @property string $tt_source
 * @property string $tt_author
 * @property string $tt_keyword
 * @property string $tt_views
 * @property integer $tt_showviews
 * @property string $tt_time
 * @property string $tt_voters_up
 * @property string $tt_voters_down
 * @property string $tt_comments
 * @property string $tt_score
 * @property integer $tt_best
 * @property integer $tt_visible
 */
class XhTitle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XhTitle the static model class
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
		return 'xh_title';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tt_showviews, tt_best, tt_visible', 'numerical', 'integerOnly'=>true),
			array('cl_id, tt_views, tt_time, tt_voters_up, tt_voters_down, tt_comments, tt_score', 'length', 'max'=>10),
			array('tt_title, tt_keyword', 'length', 'max'=>100),
			array('tt_source, tt_author', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tt_id, cl_id, tt_title, tt_source, tt_author, tt_keyword, tt_views, tt_showviews, tt_time, tt_voters_up, tt_voters_down, tt_comments, tt_score, tt_best, tt_visible', 'safe', 'on'=>'search'),
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
			'tt_id' => 'Tt',
			'cl_id' => '笑话类别：',
			'tt_title' => '笑话标题：',
			'tt_source' => '笑话来源：',
			'tt_author' => '发表作者：',
			'tt_keyword' => '文章关键词：',
			'tt_views' => 'Tt Views',
			'tt_showviews' => 'Tt Showviews',
			'tt_time' => 'Tt Time',
			'tt_voters_up' => 'Tt Voters Up',
			'tt_voters_down' => 'Tt Voters Down',
			'tt_comments' => 'Tt Comments',
			'tt_score' => 'Tt Score',
			'tt_best' => 'Tt Best',
			'tt_visible' => 'Tt Visible',
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

		$criteria->compare('tt_id',$this->tt_id,true);
		$criteria->compare('cl_id',$this->cl_id,true);
		$criteria->compare('tt_title',$this->tt_title,true);
		$criteria->compare('tt_source',$this->tt_source,true);
		$criteria->compare('tt_author',$this->tt_author,true);
		$criteria->compare('tt_keyword',$this->tt_keyword,true);
		$criteria->compare('tt_views',$this->tt_views,true);
		$criteria->compare('tt_showviews',$this->tt_showviews);
		$criteria->compare('tt_time',$this->tt_time,true);
		$criteria->compare('tt_voters_up',$this->tt_voters_up,true);
		$criteria->compare('tt_voters_down',$this->tt_voters_down,true);
		$criteria->compare('tt_comments',$this->tt_comments,true);
		$criteria->compare('tt_score',$this->tt_score,true);
		$criteria->compare('tt_best',$this->tt_best);
		$criteria->compare('tt_visible',$this->tt_visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}