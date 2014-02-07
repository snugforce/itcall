<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends EController
{
    public $layout='//layouts/main';

    public $menu=array();

    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index', 'error', 'login', 'logout',),
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
	public function actionIndex()
	{
        $user_id = Yii::app()->user->id;
        if ($user_id==null)
            $this->render('index');
        else
            $this->actionNews();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionLogin()
	{
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
                Yii::app()->request->redirect('news');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionReadall()
    {
        Newcall::RemoveAllNews();
        $this->redirect(array('news'));
    }

    public function actionRead($id)
    {
        Newcall::RemoveNews($id);
        $this->redirect(array('news'));
    }

    public function actionNews()
    {
        $model=Call::model()->with(array(
            'newcall'=>array(
                // записи нам не нужны
                'select'=>false,
                'joinType'=>'INNER JOIN',
                'condition'=>'newcall.user_id='.Yii::app()->user->id,
                'order' => 'update_time',
            ),
        ))->findAll();
        $dataProvider = new CArrayDataProvider($model,
            array(
                'pagination'=>array(
                    'pageSize'=>15,
                ),));



        $this->render('news',array(
            'dataProvider'=>$dataProvider,
        ));
    }

}