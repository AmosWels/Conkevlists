<?php

class UserController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		if(Yii::app()->user->isGuest){
			Yii::app()->user->logout();
			$this->redirect(array('login'));
		}else{
//                    $this->render('about');
                        $this->redirect(array('user/panel'));
                    
                    
//			$userid = Yii::app()->user->id;
//			$default = "new1234";
//			$user_data=users::model()->findByAttributes(array('id'=>$userid));
//			
//			if($user_data->password == md5($default)){
//				$this->redirect(array('pwd_reset'));
//			}else{
//				
//				//reseting from inside
//				if(isset($_POST['old-password'])){
//					$old_password = $_POST['old-password'];
//					$new_password = $_POST['new-password'];
//					$confirm_password = $_POST['confirm-password'];
//					$userid = Yii::app()->user->id;
//					
//					$model=UserData::model()->findByPk($userid);
//					
//					if($model->password == md5($old_password) AND $new_password == $confirm_password){
//			
//						$model->password = md5($new_password);
//						if($model->save()){
//							$this->redirect(array('site/logout'));
//						}
//					}elseif($model->password != md5($old_password)){
//						echo "<script>alert('REQUEST DROPPED !!!, Your Current Password is wrong, Try Again'); window.location = './index.php?r=site/index';</script>";
//					}elseif($new_password != $confirm_password){
//						echo "<script>alert('REQUEST DROPPED !!!, Your Passwords do not match, Try Again'); window.location = './index.php?r=site/index';</script>";
//					}
//				}
//				
//				$this->render('index');
//			}
		}
                
                $this->render('index');
	}
	
        
	
        public function actionPanel()
	{
            if(Yii::app()->user->isGuest){
                Yii::app()->user->logout();
                $this->redirect(array('login'));
            }else{
                $this->render('panel');
            }
        }
        
        
	public function actionPwd_reset()
	{
		
//		if(isset($_POST['new-password'])){
//			
//			$current_password = "new1234";
//			$new_password = $_POST['new-password'];
//			$confirm_password = $_POST['confirm-password'];
//			$userid = Yii::app()->user->id;
//			
//			if($new_password == $confirm_password){
//			
//				$model=UserData::model()->findByPk($userid);
//				$model->password = md5($new_password);
//				if($model->save()){
//					
//					echo "<script>alert('SUCCESS !!!, Your Password has successfully been reset, Login'); window.location = './index.php?r=site/logout';</script>";
//					//$this->redirect(array('site/logout'));
//				}
//			}else{
//				echo "<script>alert('REQUEST DROPPED !!!, Your Passwords do not match, Try Again'); window.location = './index.php?r=site/pwd_reset';</script>";
//			}
//		}
		
		$this->layout='login';
		$this->render('pwd_reset');
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest){
				echo $error['message'];
                        }else{
				$this->render('error', $error);
                        }
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='login';
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
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->user->returnUrl);
                        }
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
}