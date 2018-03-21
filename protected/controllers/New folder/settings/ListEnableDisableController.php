<?php

class ListEnableDisableController extends Controller
{
	 /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            //maker
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $new_link = "settings/listEnableDisable";

        //request list
        if (isset($_POST['request-list-id'])) {
            $model = new TListRequest;
            $model->list = ucfirst($_POST['request-list-id']);
            $model->request = $_POST['request'];
            $model->reason = "";
            $model->maker = Yii::app()->user->userid;
            if ($model->save()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Request Failed !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }
        
//            #################################################### 
        //change request reason
        if (isset($_POST['request-reason'])) {
            $request_id = $_POST['request-id'];
            $model = TListRequest::model()->findByPk($request_id);
            $model->reason = $_POST['request-reason'];
             if ($model->update()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }
        
//            #################################################### 
        //delete request
        if (isset($_POST['delete-request-id'])) {
            $request_id = $_POST['delete-request-id'];
            $model = TListRequest::model()->findByPk($request_id); 
            if ($model->delete()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Deleted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }
        
//            #################################################### 
        //submit request
        if (isset($_POST['submit-request-id'])) {
            $request_id = $_POST['submit-request-id'];
            $list_id = $_POST['list-id'];
            $request = $_POST['request'];
            
            $model = TLists::model()->findByPk($list_id);
            $model->status = $request;
            if ($model->update()) {
                $model2 = TListRequest::model()->findByPk($request_id);
                $model2->delete();
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Submitted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }


        //            #################################################### 


        $this->render('index');
    }

}