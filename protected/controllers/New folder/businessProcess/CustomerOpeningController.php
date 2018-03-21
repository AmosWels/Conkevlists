<?php

class CustomerOpeningController extends Controller {

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
                'actions' => array('index', 'prospect', 'customer','sanction'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionProspect() {
        $this->render('prospect');
    }

    public function actionCustomer($id) {
        $new_link = "businessProcess/customerOpening/customer";

//            $this->render('customer');
        //adding requirement document
        if (isset($_POST['upload-image'])) {

            $code = new Encryption;
            $rim = $code->decode($id);
            $previous_image_id = $_POST['upload-image'];
            
            $modelImage = new TImage;
//            $upload_date_time = date("Y-m-d h-i-s");
            $upload_date_time = date("Ymdhis");

            $uploadedFile = CUploadedFile::getInstance($modelImage, 'imageUpload');
            $ext = CFileHelper::getExtension($uploadedFile);
            $ext_array = array('gif', 'png', 'jpg', 'jpeg');

            if (in_array($ext, $ext_array)) {
                $fileName = "{$upload_date_time}.{$ext}";

                $dimension = getimagesize($uploadedFile->tempName);
                $modelImage->rim = $rim;
                $modelImage->image = $code->encode($fileName);
                $modelImage->type = $uploadedFile->type;
                $modelImage->dimensions = $dimension[0] . 'x' . $dimension[1];
                $modelImage->size = $uploadedFile->size;
                $modelImage->maker = Yii::app()->user->userid;

                if ($modelImage->save()) {
                    //disable previous profile image
                    if($previous_image_id != 0){
                        $modelProfile = TImage::model()->findByPk($previous_image_id);
                        $modelProfile->status = 'C';
                        $modelProfile->update();
                    }
                    //moving image to server
                    $image_lib = Yii::app()->basePath . "/../ImageUploads/";
                    if (!file_exists($image_lib)) {
                        mkdir($image_lib, 0777, true);
                    }
                    $image_path = $image_lib . "/{$rim}/";
                    if (!file_exists($image_path)) {
                        mkdir($image_path, 0777, true);
                    }

                    $uploadedFile->saveAs($image_path . $fileName);

                $this->redirect(array($new_link, 'id' => $id));
                }
            } else {
                echo "<script>alert('Not Saved !!!, only IMAGE files are accepted, Please Try Again');</script>"; 
            }
        }
        
        //make profile image
        if (isset($_POST['make-profileimage-id'])) {
            
            $previous_image_id = $_POST['previous-image-id'];
            $current_image_id = $_POST['make-profileimage-id'];
            
            $modelCurrent = TImage::model()->findByPk($current_image_id);
            $modelCurrent->status = 'A';
            if($modelCurrent->update()){
                //close previous
                if($previous_image_id != 0){
                    $modelPrevious = TImage::model()->findByPk($previous_image_id);
                    $modelPrevious->status = 'C';
                    $modelPrevious->update();
                }
            $this->redirect(array($new_link, 'id' => $id));
            }else{
                echo "<script>alert('Not Changed !!!, Some thing went wrong, Please Try Again');</script>"; 
            }
        }
        
        
        //delete image
        if (isset($_POST['delete-image-id'])) {
            
            $image_id = $_POST['delete-image-id'];
            $model = TImage::model()->findByPk($image_id);
            if($model->delete()){
                $this->redirect(array($new_link, 'id' => $id));
            }else{
                echo "<script>alert('Not Deleted !!!, Some thing went wrong, Please Try Again');</script>"; 
            }
        }


        $this->render('customer', array(
            'model' => $this->loadCustomerModel($id),
        ));
    }

    public function actionSanction($id) {
    $this->render('sanction', array(
            'model' => $this->loadCustomerModel($id),
        ));
      
    }
    
    
    public function loadCustomerModel($id) {
//		$model= NewCustomer::model()->findByPk($id);
        $code = new Encryption;
        $rim = $code->decode($id);
        $model = NewCustomer::model()->findByAttributes(array('rim' => $rim));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
