<?php

class PanelController extends Controller {

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
            
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('organizationType','countryList','organizationAttributes','peopleAttributes',
                    'rejectioncategory','addressType', 'addressOwnership'),
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
    
    ############################################################################

    public function actionOrganizationType() {
        $organizations = TOrganizationtype::model()->findAll("status IN ('A','C')");           
        
        if (isset($_POST['new-organ-type'])) { 
            $model = new TOrganizationtype();
            $model->name = $_POST['new-organ-type'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/organizationType'));
        }
         //changing status
        if (isset($_POST['organizationtype-status'])) {            
            $status = $_POST['organizationtype-status'];
            $type_id = $_POST['organizationtype-id'];
            
            $model = TOrganizationtype::model()->findByPk($type_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/organizationType'));
        }
//        update organisation type name
        if (isset($_POST['new-name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['type_id'];
            $model = TOrganizationtype::model()->findByPk($id);
            $model->name = $_POST['new-name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/organizationType'));
        }
        if (isset($_POST['type_id_delete'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['type_id_delete'];
            $model = TOrganizationtype::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/organizationType'));
        }
        
        $this->render('organizationType', array('model' => $organizations,));
    }
    
    ############################################################################
    
    public function actionCountryList() {
        $countries = TCountry::model()->findAll("status IN ('A','C')");           
        
         //changing status
        if (isset($_POST['country-status'])) {            
            $status = $_POST['country-status'];
            $country_id = $_POST['country-id'];
            
            $model = TCountry::model()->findByPk($country_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/countryList'));
        }
        
        $this->render('countryList', array('model' => $countries,));
    }
    
    ############################################################################

    public function actionOrganizationAttributes() {
        $organizations = TOrganizationresearch::model()->findAll("status IN ('A','C')");           
//        create new attribute
        if (isset($_POST['new-attribute'])) { 
            $model = new TOrganizationresearch();
            $model->name = $_POST['new-attribute'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/organizationAttributes'));
        }           
        
         //changing status
        if (isset($_POST['organizationtype-status'])) {            
            $status = $_POST['organizationtype-status'];
            $profile_id = $_POST['organizationtype-id'];
            
            $model = TOrganizationresearch::model()->findByPk($profile_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/organizationAttributes'));
        }
        
//         update organ attribute name
        if (isset($_POST['edit_organatrr_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['edit_organatrr_id'];
            $model = TOrganizationresearch::model()->findByPk($id);
            $model->name = $_POST['new_orgattr_name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/organizationAttributes'));
        }
//        delete organ attribute
        if (isset($_POST['organattr_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['organattr_delete_id'];
            $model = TOrganizationresearch::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/organizationAttributes'));
        }
        $this->render('organizationAttributes', array('model' => $organizations,));
    }
    ############################################################################

    public function actionPeopleAttributes() {
        $people = TPeopleprofilefields::model()->findAll("Status IN ('A','C')");           
        
        if (isset($_POST['new-attribute'])) { 
            $model = new TPeopleprofilefields();
            $model->name = $_POST['new-attribute'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/peopleAttributes'));
        }           
        
         //changing status
        if (isset($_POST['peopleattribute-status'])) {            
            $status = $_POST['peopleattribute-status'];
            $profile_id = $_POST['peopleattribute-id'];
            
            $model = TPeopleprofilefields::model()->findByPk($profile_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/peopleAttributes'));
        }
        
//         update people attribute name
        if (isset($_POST['edit_peopleatrr_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['edit_peopleatrr_id'];
            $model = TPeopleprofilefields::model()->findByPk($id);
            $model->name = $_POST['new-attr_name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/peopleAttributes'));
        }
//        delete people attribute
        if (isset($_POST['peopleattr_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['peopleattr_delete_id'];
            $model = TPeopleprofilefields::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/peopleAttributes'));
        }
        $this->render('peopleAttributes', array('model' => $people,));
    }
    
    public function actionRejectionCategory() {
        $categories = TRejectioncategory::model()->findAll("status IN ('A','C')");
        
        //        create new category
        if (isset($_POST['new-category'])) { 
            $model = new TRejectioncategory();
            $model->name = $_POST['new-category'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/rejectioncategory'));
        }   
        
        //changing status
        if (isset($_POST['category-status'])) {            
            $status = $_POST['category-status'];
            $category_id = $_POST['category-id'];
            
            $model = TRejectioncategory::model()->findByPk($category_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/rejectioncategory'));
        }
        
        //         update organ category name
        if (isset($_POST['category_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['category_id'];
            $model = TRejectioncategory::model()->findByPk($id);
            $model->name = $_POST['new-name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/rejectioncategory'));
        }
        
        //        delete rejection category
        if (isset($_POST['rejectcategory_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['rejectcategory_delete_id'];
            $model = TRejectioncategory::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/rejectioncategory'));
        }
        
        $this->render('rejectioncategory', array('model' => $categories,));
    }
    
    public function actionAddressType() {
        $addressTypes = TAddresstype::model()->findAll("status IN ('A','C')");
        
        //        create new address Type
        if (isset($_POST['new-addresstype'])) { 
            $model = new TAddresstype();
            $model->name = $_POST['new-addresstype'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/addressType'));
        }
        
        //changing status
        if (isset($_POST['addresstype-status'])) {            
            $status = $_POST['addresstype-status'];
            $addresstype_id = $_POST['addresstype-id'];
            
            $model = TAddresstype::model()->findByPk($addresstype_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/addressType'));
        }
//     update address type name
        if (isset($_POST['addresstype-new-name'])) {
            $id = $_POST['addresstype_id'];
            $model = TAddresstype::model()->findByPk($id);
            $model->name = $_POST['addresstype-new-name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/addressType'));
        }
        
        //        delete rejection category
        if (isset($_POST['address_delete_id'])) {
            $id = $_POST['address_delete_id'];
            $model = TAddresstype::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/addressType'));
        }
        $this->render('addressType', array('model' => $addressTypes,));
    }
    
    public function actionAddressOwnership() {
        $addressOwnerships = TAddressownership::model()->findAll("status IN ('A','C')");
        
        //        create new address ownership
        if (isset($_POST['new-addressOwnership'])) { 
            $model = new TAddressownership();
            $model->name = $_POST['new-addressOwnership'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('settings/panel/addressOwnership'));
        }
        
        //changing status
        if (isset($_POST['addressowned-status'])) {            
            $status = $_POST['addressowned-status'];
            $addressowned_id = $_POST['addressowned-id'];
            
            $model = TAddressownership::model()->findByPk($addressowned_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('settings/panel/addressOwnership'));
        }
//     update address ownership name
        if (isset($_POST['addressownership-new-name'])) {
            $id = $_POST['addressownership_id'];
            $model = TAddressownership::model()->findByPk($id);
            $model->name = $_POST['addressownership-new-name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/addressOwnership'));
        }
        
        //        delete address ownership
        if (isset($_POST['addressownership_delete_id'])) {
            $id = $_POST['addressownership_delete_id'];
            $model = TAddressownership::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('settings/panel/addressOwnership'));
        }
        $this->render('addressOwnership', array('model' => $addressOwnerships,));
    }
    
}
