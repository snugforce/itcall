<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $name
 * @property integer $group_id
 * @property string $password
 * @property string $role
 * @property string $login
 * @property string $avatar
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Newcall[] $newcalls
 * @property Task[] $tasks
 * @property Taskcomment[] $taskcomments
 * @property Group $group
 * @property Usertask[] $usertasks
 */
class User extends CActiveRecord
{
	const ROLE_ADMIN = 'administrator';
    const ROLE_MODER = 'moderator';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}
	
    protected function beforeSave(){
        $this->password = md5($this->password);
        return parent::beforeSave();
    }	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, login', 'required'),
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('name, password, role, login, avatar', 'length', 'max'=>128),
            array('phone', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, group_id, password, role, login, avatar, phone', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'newcalls' => array(self::HAS_MANY, 'Newcall', 'user_id'),
			'tasks' => array(self::HAS_MANY, 'Task', 'user_id'),
			'taskcomments' => array(self::HAS_MANY, 'Taskcomment', 'user_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'usertasks' => array(self::HAS_MANY, 'Usertask', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'group_id' => 'Group',
			'password' => 'Password',
			'role' => 'Role',
			'login' => 'Login',
			'avatar' => 'Avatar',
            'phone' => 'Phone',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('avatar',$this->avatar,true);
        $criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
