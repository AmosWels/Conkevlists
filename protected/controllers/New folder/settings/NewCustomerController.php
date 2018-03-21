<?php

class NewCustomerController extends Controller {

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

    //  list of pages used
    public function actionIndex() {
        $new_link = "settings/newCustomer";
        $code = new Encryption;

        //add information requirement
        if (isset($_POST['new-information-name'])) {
            $model = new TInformationRequirement;
            $process = 'CT';
            $model->process = $process;
            $model->name = ucfirst($_POST['new-information-name']);
            $model->description = ucfirst($_POST['new-information-description']);
            $model->maker = Yii::app()->user->userid;
            if ($model->save()) {
                $info_id = $model->id;
                $clienttype_count = $_POST['clienttype-count'];

                $ct = 1;
                $type_selection = "";
                while ($ct <= $clienttype_count) {
                    if (!empty($_POST['clientType' . $ct])) {
                        $type_selection .= rtrim($_POST['clientType' . $ct] . ',');
                    } $ct++;
                }
                $mappings = explode(',', $type_selection);

                foreach ($mappings as $mapping) {
                    $model2 = new TInformationrequirementCustomertype;
                    $model2->information_requirement = $info_id;
                    $model2->customer_type = $mapping;
                    $model2->save();
                }
                
                $this->redirect(array($new_link,'loc'=>$code->encode($info_id)));
            } else {
                echo "<script>alert('Not Saved !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

//                ####################################
        //edit info requirement
        if (isset($_POST['edit-information-name'])) {
                
            $info_id = $_POST['info-id'];
            $clienttype_count = $_POST['clienttype-count'];
            $previous_selection = $_POST['old-clienttype-mapping-set'];

            $model = TInformationRequirement::model()->findByPk($info_id);
            $model->name = ucfirst($_POST['edit-information-name']);
            $model->description = ucfirst($_POST['edit-information-description']);

            if ($model->update()) {

                $ct = 1;
                $type_selection = "";
                while ($ct <= $clienttype_count) {
                    if (!empty($_POST['clientType' . $ct])) {
                        $type_selection .= rtrim($_POST['clientType' . $ct] . ',');
                    } $ct++;
                }

                $old_selections = explode(',', $previous_selection);
                $new_selections = explode(',', $type_selection);

                //              adding non existing mapping
                foreach ($new_selections as $new_selection) {
                    if (!in_array("$new_selection", $old_selections)) {

                        $model2 = new TInformationrequirementCustomertype;
                        $model2->information_requirement = $info_id;
                        $model2->customer_type = $new_selection;
                        $model2->save();
                    }
                }

                //              removing existing mapping
                foreach ($old_selections as $old_selection) {
                    if (!in_array("$old_selection", $new_selections)) {

                        $model3 = TInformationrequirementCustomertype::model()->findByAttributes(
                                array('information_requirement' => $info_id, 'customer_type' => $old_selection));
                        if(!empty($model3)){ $model3->delete(); }
                    }
                }
            }
        $this->redirect(array($new_link,'loc'=>$code->encode($info_id)));
        }

//                ####################################
        //mapping document types
        if (isset($_POST['irct-id'])) {
            
                $info_id = $_POST['info-id'];
                $irct_id = $_POST['irct-id'];
                $documenttype_count = $_POST['documenttype-count'];
                $previous_selection = $_POST['old-documenttype-mapping-set'];

                $dt = 1;
                $type_selection = "";
                while ($dt <= $documenttype_count) {
                    if (!empty($_POST['documentType' . $dt])) {
                        $type_selection .= rtrim($_POST['documentType' . $dt] . ',');
                    } $dt++;
                }

                $old_selections = explode(',', $previous_selection);
                $new_selections = explode(',', $type_selection);

                //              adding non existing mapping
                foreach ($new_selections as $new_selection) {
                    if (!in_array("$new_selection", $old_selections)) {

                        $model = new TInformationrequirementCustomertypeDocumenttype;
                        $model->inforreg_custype = $irct_id;
                        $model->document_type = $new_selection;
                        $model->save();
                    }
                }

                //              removing existing mapping
                foreach ($old_selections as $old_selection) {
                    if (!in_array("$old_selection", $new_selections)) {

                        $model3 = TInformationrequirementCustomertypeDocumenttype::model()->findByAttributes(
                                array('inforreg_custype' => $irct_id, 'document_type' => $old_selection));
                        if(!empty($model3)){ $model3->delete(); }
                    }
                }
            
            $this->redirect(array($new_link,'loc'=>$code->encode($info_id)));
        }
            
        
//                    #################################################### 
                  
        //delete information requirement
        if (isset($_POST['delete-information-id'])) {
            $info_id = $_POST['delete-information-id'];
            $model = TInformationRequirement::model()->findByPk($info_id); 
            if($model->delete()) { 
                //also delete the client type mappings
                $clienttype_mappings = TInformationrequirementCustomertype::model()->findAll("information_requirement = $info_id");
                if(!empty($clienttype_mappings)){
                    foreach ($clienttype_mappings as $item_ct) {
                        $ct_map_id = $item_ct->id;
                        $ct_model = TInformationrequirementCustomertype::model()->findByPk($ct_map_id);
                        if($ct_model->delete()){
                            //also delete the document type mappings
                            $documenttype_mappings = TInformationrequirementCustomertypeDocumenttype::model()->findAll("inforreg_custype = $ct_map_id");
                            if(!empty($documenttype_mappings)){
                                foreach ($documenttype_mappings as $item_dt) {
                                $dt_map_id = $item_dt->id;
                                $dt_model = TInformationrequirementCustomertypeDocumenttype::model()->findByPk($dt_map_id);
                                $dt_model->delete();
                                }
                            } //if mapped to dt   
                        }
                    }
                } //if mapped to ct            
            }
        $this->redirect([$new_link]);
        } 
        
        
//                ####################################
        //submit information requirement
        if (isset($_POST['submit-information-id'])) {
            $info_id = $_POST['submit-information-id'];
            $model = TInformationRequirement::model()->findByPk($info_id);
            $model->status = 'A';
            if ($model->update()) {
                $this->redirect([$new_link]);
            } else {
                echo "<script>alert('Not Submitted !!!, Some thing went wrong, Please Try Again'); window.location = './index.php?r=$new_link';</script>";
            }
        }

        $this->render('index');
    }

}
