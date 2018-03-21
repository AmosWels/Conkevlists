<?php

class OrganisationController extends Controller {

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
                'actions' => array('index','view','search','create','maker',),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $userid = Yii::app()->user->userid;

        $this->render('index', array(
            'model' => $this->loadModelList($userid),
        )); 
    }

    //load organizations
    public function loadModelList($userid) {
        $model = TOrganization::model()->findAll("status = 'D' AND maker = '$userid'");
        if($model === NULL){
//            LOG errors and redirect  
        }else{
           return $model; 
        }  
    }
//    search page
    public function actionSearch() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
//        capture user decision
        if (isset($_POST['result'])) {
            $nomatchname = $_POST['newname'];
            $code = new Encryption;
            $codedname = $code->encode($nomatchname);
            
            $usermatch = $_POST['result'];
//            $model = new TSearchresults;
//            $model->result = $usermatch;
            if ($usermatch == 2) {
                 $this->redirect(array('research/maker/organisation/create','value'=>$codedname));
            } else {
                //log error
            } 
            $this->redirect(array('research/maker/organisation/search'));
    }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid,$query),
        ));
    }
    public function loadSearchResult($userid,$query) {
        $min_length = 2;
//            LOG errors and redirect  
            if($query != NULL AND strlen($query) > $min_length){
                $results = TOrganization::model()->findAll("Name LIKE '%" . $query . "%' AND status = 'A'");
            }else{
                $results = NULL;
            }
        return $model = array($results,$query);
    }
//    create organisation
    public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        //adding organization
        if (isset($_POST['new-name-organization'])) {
            $model = new TOrganization();
            $model->name = $_POST['new-name-organization'];
            $model->type = $_POST['new-type'];
            $model->country = $_POST['new-country'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('research/maker/organisation'));
        }
//        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('research/maker/organisation'));
        }
        
        $this->render('create');
    }
    
    
//    ###########################################################################
    
    
    public function actionView($id) {
        $userid = Yii::app()->user->userid;
        $code = new Encryption;
        $organization = $code->decode($id);
        
         //add website citation
        if (isset($_POST['new-title-citation'])) {
            $model = new TOrganizationCitation;            
            $model->type = $_POST['citation-type'];
            $model->organization = $organization;
            $model->authors = $_POST['new-author'];
            $model->publish_date = $_POST['new-date-published'];
            $model->title = $_POST['new-title-citation'];
            $model->url = $_POST['new-url'];
            $model->publisher = $_POST['new-publisher'];
            $model->ref_publisher = $_POST['new-ref-publisher'];
            $model->access_date = $_POST['new-date-accessed'];
            $model->maker = $userid;
            $model->status = 'P';
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('research/maker/organisation/view','id'=>$id));
        }
       
        //edit website citation
        if (isset($_POST['edit-title-citation'])) {
            $citation_id = $_POST['website-citation-id'];
            $model = TOrganizationCitation::model()->findByPk($citation_id); 
            $model->authors = $_POST['edit-author'];
            $model->publish_date = $_POST['edit-date-published'];
            $model->title = $_POST['edit-title-citation'];
            $model->url = $_POST['edit-url'];
            $model->publisher = $_POST['edit-publisher'];
            $model->ref_publisher = $_POST['edit-ref-publisher'];
            $model->access_date = $_POST['edit-date-accessed'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('research/maker/organisation/view','id'=>$id));
        }
                
        //mapping citation
//        if (isset($_POST['map-citation'])) {
//            
//                $citation_id = $_POST['map-citation'];
//                $items_count = $_POST['items-count'];
//                $previous_selection = $_POST['old-mapping-set'];
//
//                $r = 1;
//                $item_selection = "";
//                while ($r <= $items_count) {
//                    if (!empty($_POST['research' . $r])) {
//                        $item_selection .= rtrim($_POST['research' . $r] . ',');
//                    } $r++;
//                    
//                }
//
//                $old_selections = explode(',', $previous_selection);
//                $new_selections = explode(',', $item_selection);
//
//                //              adding non existing mapping
//                foreach ($new_selections as $new_selection) {
//                    if (!in_array("$new_selection", $old_selections)) {
//
//                        $model = new TOrganizationcitationMapping;
//                        $model->organization = $organization;
//                        $model->citation = $citation_id;
//                        $model->research = $new_selection;
//                        $model->save();
//                    }
//                }
//
//                //              removing existing mapping
//                foreach ($old_selections as $old_selection) {
//                    if (!in_array("$old_selection", $new_selections)) {
//
//                        $model3 = TOrganizationcitationMapping::model()->findByAttributes(
//                                array('citation' => $citation_id, 'research' => $old_selection));
//                        if(!empty($model3)){ $model3->delete(); }
//                    }
//                }
//            
//            $this->redirect(array('research/maker/organisation/view','id'=>$id));
//        }
        
        
        
          //submit organization
        if (isset($_POST['submit-organization-id'])) {
            $organization_id = $_POST['submit-organization-id'];
            $model = TOrganization::model()->findByPk($organization_id); 
            $model->status = 'A';           
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('research/maker/organisation'));
        }
        
        
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    
    //load organization
    public function loadModel($id) {
        $code = new Encryption;
        $organization_id = $code->decode($id);
        
        $organization = TOrganization::model()->findByPk($organization_id);
//        $organization_id = $organization->id;
        if($organization === NULL){
            //LOG errors and redirect  
        }else{ 
           $citations = TOrganizationCitation::model()->findAll("organization = $organization_id and status='P'");                      
           return $model = array($organization,$citations); 
        }        
    }

}
