<?php

/**
 * This is the model class for table "{{newcall}}".
 *
 * The followings are the available columns in table '{{newcall}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $call_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Call $call
 */
class Newcall extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{newcall}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

    public static function AddNews($call_id){
        foreach(User::model()->findAll() as $usr){
            if ($usr->role!='administrator')
            {
                $nc = new Newcall();
                $nc->user_id = $usr->id;
                $nc->call_id = $call_id;
                $nc->save();
            }
        }
    }
    public static function RemoveNews($call_id)
    {
        $user_id = Yii::app()->user->id;
        if ($user_id!=null){
            $criteria=new CDbCriteria;
            $criteria->addCondition('call_id='.$call_id);
            $criteria->addCondition('user_id='.$user_id);
            Newcall::model()->deleteAll($criteria);
        }
    }
    public static function RemoveAllNews()
    {
        $user_id = Yii::app()->user->id;
        if ($user_id!=null){
            $criteria=new CDbCriteria;
            $criteria->addCondition('user_id='.$user_id);
            Newcall::model()->deleteAll($criteria);
        }
    }
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, call_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, call_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'call' => array(self::BELONGS_TO, 'Call', 'call_id'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('call_id',$this->call_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Newcall the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
