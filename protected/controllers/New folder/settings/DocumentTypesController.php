<?php

class DocumentTypesController extends Controller {

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
        $new_link = "settings/documentTypes";

        //add document type
        if (isset($_POST['new-document-name'])) {
            $model = new TDocumentType;
            $model->code = strtoupper($_POST['new-document-code']);
            $model->name = $_POST['new-document-name'];
            $model->maker = Yii::app()->user->userid;
            if ($model->save()) {
                $documenttype_id = $model->id;
                $metadata_count = $_POST['metadata-count'];

                $md = 1;
                $type_selection = "";
                while ($md <= $metadata_count) {
                    if (!empty($_POST['metaData' . $md])) {
                        $type_selection .= rtrim($_POST['metaData' . $md] . ',');
                    } $md++;
                }
                $mappings = explode(',', $type_selection);

                foreach ($mappings as $mapping) {
                    $model2 = new TDocumenttypeMetadata;
                    $model2->document_type = $documenttype_id;
                    $model2->metadata = $mapping;
                    $model2->save();
                }
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

//            #################################################### 
        //edit document type
        if (isset($_POST['edit-document-name'])) {
            $documenttype_id = $_POST['doc-type-id'];
            $metadata_count = $_POST['metadata-count'];
            $previous_selection = $_POST['old-metadata-mapping-set'];

            $model = TDocumentType::model()->findByPk($documenttype_id);
            $model->code = strtoupper($_POST['edit-document-code']);
            $model->name = $_POST['edit-document-name'];

            if ($model->update()) {

                $md = 1;
                $type_selection = "";
                while ($md <= $metadata_count) {
                    if (!empty($_POST['metaData' . $md])) {
                        $type_selection .= rtrim($_POST['metaData' . $md] . ',');
                    } $md++;
                }

                $old_selections = explode(',', $previous_selection);
                $new_selections = explode(',', $type_selection);

                // adding non existing mapping
                foreach ($new_selections as $new_selection) {
                    if (!in_array("$new_selection", $old_selections)) {

                        $model2 = new TDocumenttypeMetadata;
                        $model2->document_type = $documenttype_id;
                        $model2->metadata = $new_selection;
                        $model2->save();
                    }
                }

                // removing existing mapping
                foreach ($old_selections as $old_selection) {
                    if (!in_array("$old_selection", $new_selections)) {

                        $model3 = TDocumenttypeMetadata::model()->findByAttributes(
                                array('document_type' => $documenttype_id, 'metadata' => $old_selection));
                        if(!empty($model3)){ $model3->delete(); }
                    }
                }
            }
            $this->redirect([$new_link]);
        }

//            #################################################### 
        //delete document type
        if (isset($_POST['delete-document-id'])) {
            $documenttype_id = $_POST['delete-document-id'];
            $model = TDocumentType::model()->findByPk($documenttype_id); 
            if($model->delete()) { 
                //also close or delete the mappings
                $metadata_mappings = TDocumenttypeMetadata::model()->findAll("document_type = $documenttype_id");
                
                foreach ($metadata_mappings as $item) {
                    $model2 = TDocumenttypeMetadata::model()->findByPk($item->id);
                    if(!empty($model2)){ $model2->delete(); }
                }
            }
        $this->redirect([$new_link]);
        }


//            #################################################### 
        //submit document type
        if (isset($_POST['submit-document-id'])) {
            $documenttype_id = $_POST['submit-document-id'];
            $model = TDocumentType::model()->findByPk($documenttype_id);
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
