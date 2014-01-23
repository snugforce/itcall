<?php

/**
 * This is the model class for table "{{call}}".
 *
 * The followings are the available columns in table '{{call}}':
 * @property integer $id
 * @property string $name
 * @property integer $group_id
 * @property integer $category_id
 * @property string $ip
 * @property string $txt
 * @property string $office
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Group $group
 * @property Status $status
 * @property Comment[] $comments
 */
class Call extends CActiveRecord
{
    public $verifyCode;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{call}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, office, category_id, group_id, txt', 'required'),
			array('group_id, category_id, create_time, update_time, status_id', 'numerical', 'integerOnly'=>true),
			array('name, office', 'length', 'max'=>128),
			array('ip', 'length', 'max'=>16),
			
			array('txt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, group_id, category_id, ip, txt, office, create_time, update_time, status_id', 'safe', 'on'=>'search'),
            array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'call_id',
				'order'=>'comments.create_time DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'call_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'name' => Yii::t('main', 'Name'),
			'group_id' => Yii::t('main', 'Group'),
			'category_id' => Yii::t('main', 'Category'),
			'ip' => 'IP',
			'txt' => Yii::t('main', 'Txt'),
			'office' => Yii::t('main', 'Office'),
			'create_time' => Yii::t('main', 'Create Time'),
			'update_time' => Yii::t('main', 'Update Time'),
			'status_id' => Yii::t('main', 'Status'),
            'verifyCode' => 'Код проверки',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('ip',$this->ip);
		$criteria->compare('txt',$this->txt,true);
		$criteria->compare('office',$this->office,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function addComment($comment)
	{
		$comment->call_id=$this->id;
		$comment->user_id=Yii::app()->user->id;
        $this->status_id=$comment->status_id;
        $this->save();
		return $comment->save();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Call the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->status_id = 1; // Активный
				$this->create_time=$this->update_time=time();
				$this->ip=Yii::app()->request->userHostAddress;				
			}
			else
				$this->update_time=time();
			return true;
		}
		else
			return false;
	}	
}
