<?php

class BlacklistProgramsController extends Controller
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
        $new_link = "settings/blacklistPrograms";

        //add blacklist program
        if (isset($_POST['new-program-name'])) {
            $model = new TBlacklistProgram;
            $model->name = ucfirst($_POST['new-program-name']);
            $model->description = $_POST['new-program-description'];
            $model->maker = Yii::app()->user->userid;
            if ($model->save()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

//            #################################################### 
        //edit blacklist program
        if (isset($_POST['edit-program-name'])) {
            $program_id = $_POST['program-id'];
            $model = TBlacklistProgram::model()->findByPk($program_id);
            $model->name = ucfirst($_POST['edit-program-name']);
            $model->description = $_POST['edit-program-description'];
             if ($model->update()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

//            #################################################### 
        //delete blacklist program
        if (isset($_POST['delete-program-id'])) {
            $program_id = $_POST['delete-program-id'];
            $model = TBlacklistProgram::model()->findByPk($program_id); 
            if ($model->delete()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Deleted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }


//            #################################################### 
        //submit blacklist program
        if (isset($_POST['submit-program-id'])) {
            $program_id = $_POST['submit-program-id'];
            $model = TBlacklistProgram::model()->findByPk($program_id);
            $model->status = 'A';
            if ($model->update()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Submitted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }


        //            #################################################### 


        $this->render('index');
    }

}