<?php

require_once './../app/extensions/smsru.php';

class CallController extends EController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/options';

    /**
    * @var array context menu items. This property will be assigned to {@link CMenu::items}.
    */
    public $menu=array();

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				//'actions'=>array('index','view','admin','delete','create','update'),
				'actions'=>array('index','view','create',),
				'roles' => array('administrator'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'view', 'create', 'captcha',),
				'roles' => array('guest'),
			),
            array('allow',
                'actions'=>array('news', 'readall', 'read',),
                'roles' => array('user'),
            ),
			array('deny',  // deny all users
				'roles' => array('guest'),
			),						
		);
	}

    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'ECaptchaAction',
                'width'=>'60',
                'height'=>'30',
                'testLimit'=>'1',
                'maxLength'=>4,
                'minLength'=>4,
                'backColor'=>0xEEEEEE,
                'foreColor'=>0x0072E6,
                'backend'=>null,
                'offset'=>0,
                'fontFile'=>'css/fonts/Den.otf',
            ),
        );

    }

	/**
	 * Displays a particular model.
	 */
    public function actionView()
    {
        $id=$this->getActionParam('id');
		$model = $this->loadModel('Call', $id);	
		
		$this->performAjaxValidation($model);
		
		$comment=$this->newComment($model);
        $comment->status_id = $model->status_id;
		
        $this->render('view',array(
            'model'=>$model,
			'comment'=>$comment,
        ));
        Newcall::RemoveNews($id);
    }	
	
	protected function newComment($model)
	{
		$comment=new Comment;
	 
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}


		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
            if ($comment->txt!=''){
                if ($comment->status_id == null){$comment->status_id = $model->status_id;}
                if($model->addComment($comment))
                    $this->refresh();
            }
		}
		return $comment;
	}

    protected function SendSMS(Call $call){
        $api_id = "5247ab48-14a0-7934-69a8-90bc22c3e222";
        $sms = new \Zelenin\smsru($api_id);
        foreach($call->group->users as $usr){
            if ($usr->phone!='')
                $sms->sms_send($usr->phone, $call->office.': '.$call->txt, 'it.nchti.ru');
        }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */ 
	 
	public function actionCreate($group_id=null)
	{
		$model=new Call;
		
		if($group_id!=null)
			$model->group_id = $group_id;
			
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Call']))
		{
			$model->attributes=$_POST['Call'];
			if($model->save())
            {
                $this->SendSMS($model);
                $this->redirect(array('view','id'=>$model->id));
            }
		}
        $this->createAction('captcha')->getVerifyCode(True);

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
        $id=$this->getActionParam('id');
        $model=$this->loadModel('Call', $id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Call']))
		{
			$model->attributes=$_POST['Call'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 */
	public function actionDelete($id)
	{
		$id=$this->getActionParam('id');
        $this->loadModel('Call', $id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($status_id=null, $group_id=null)
	{
        if($status_id==null) $status_id = 1;
        $criteria=new CDbCriteria;
        if($group_id!=null)
            $criteria->addCondition('group_id='.$group_id);

        $criteria->addCondition('status_id='.$status_id);

        $criteria->order = 'create_time DESC';

        $dataProvider=new CActiveDataProvider('Call',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>15,
                ),
            ));

        $prs = $_GET;
        $cr = new CDbCriteria;

        foreach(Status::model()->findAll() as $itm){
            $cr->condition ='';
            $cr->addCondition('status_id='.$itm->id);
            if($group_id!=null)
              $cr->addCondition('group_id='.$group_id);
            $prs['status_id'] = $itm->id;
            $l1[$itm->id]=array('label'=>$itm->name.' '.
                TbHtml::badge(Call::model()->count($cr), array('color' => TbHtml::BADGE_COLOR_INVERSE)),
                'url'=>$this->createUrl($this->route, $prs));
        }
        $l1[$status_id]['active']='active';

        //$group = new Group;
        $group = null;
        if ($group_id!=null) $group=Group::model()->findByPk($group_id);


        $this->render('index',array(
            'dataProvider'=>$dataProvider,
            'group_id'=>$group_id,
            'group'=>$group,
            'status_id'=>$status_id,
            'buttons'=>$l1,
        ));
	}

}