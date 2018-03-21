<?php

class CustomerTypesController extends Controller
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
        $new_link = "settings/customerTypes";

        //add category mapping
        if (isset($_POST['new-category-mapping'])) {
            $model = new TCustomertypeCategory;
            $model->customer_type = $_POST['customer-type'];
            $model->category = $_POST['new-category-mapping'];
            $model->maker = Yii::app()->user->userid;
            if ($model->save()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

//            #################################################### 
        //edit category mapping
        if (isset($_POST['edit-category-mapping'])) {
            $category_id = $_POST['category-id'];
            $model = TCustomertypeCategory::model()->findByPk($category_id);
            $model->category = $_POST['edit-category-mapping'];
            if ($model->update()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }
        
//            #################################################### 
        //delete category mapping
        if (isset($_POST['delete-category-id'])) {
            $category_id = $_POST['delete-category-id'];
            $model = TCustomertypeCategory::model()->findByPk($category_id);
            if ($model->delete()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Deleted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }


//            #################################################### 
        //submit category mapping
        if (isset($_POST['submit-category-id'])) {
            $category_id = $_POST['submit-category-id'];
            $model = TCustomertypeCategory::model()->findByPk($category_id);
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
