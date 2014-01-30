<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $call_id
 * @property integer $create_time
 * @property integer $status_id
 * @property string $txt
 * @property string $public
 *
 * The followings are the available model relations:
 * @property Call $call
 * @property Status $status
 * @property User $user
 */
class Comment extends CActiveRecord
{
    public $checkStatus;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('call_id, status_id', 'required'),
			array('user_id, call_id, create_time, status_id', 'numerical', 'integerOnly'=>true),
			array('txt', 'safe'),
            array('public', 'boolean'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, call_id, create_time, status_id, txt, public', 'safe', 'on'=>'search'),
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
			'call' => array(self::BELONGS_TO, 'Call', 'call_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'call_id' => 'Call',
			'create_time' => 'Create Time',
			'status_id' => 'Status',
			'txt' => 'Txt',
            'public' => Yii::t('main','Public'),
		);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
            if($this->isNewRecord){
				$this->create_time=time();
			}
			return true;
		}
		else
			return false;
	}

    protected function afterSave()
    {
        parent::afterSave();
        Newcall::AddNews($this->call_id);
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('call_id',$this->call_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('txt',$this->txt,true);
        $criteria->compare('public',$this->public);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
