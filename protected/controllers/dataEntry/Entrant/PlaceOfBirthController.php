<?php

class PlaceOfBirthController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionIndex_new()
	{
            $userid = Yii::app()->user->userid;
            //    take up citation
        if (isset($_POST['record-id'])) {
            $record_id = $_POST['record-id'];
            $model = TPcitationProfilefieldsMappings::model()->findByPk($record_id);
            $model->status = 'T';
            $model->data_entrant = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/placeOfBirth/index_new'));
        }

		$this->render('index_new');
	}
        
        public function actionSearch($id) { 

        $userid = Yii::app()->user->userid;
        $query = NULL;
        $person = NULL;
        $results = NULL;
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            $person = $_POST['person_search']; 
            
        }
//        routing the user action
        if (isset($_POST['result'])) {
            $person = $_POST['person_id']; //person id
            $code = new Encryption;
            $codedperson = $code->encode($person); //passed as value
            
            $usermatch = $_POST['result'];
            if ($usermatch == 2) {
//                 $this->redirect(array('dataEntry/Entrant/politicalassignment/create','value'=>$codedname,'name'=>$codedorgan));
            $this->redirect(array('dataEntry/Entrant/placeOfBirth/search','id'=> $id));
            } else {
                //log error
                 $this->redirect(array('dataEntry/Entrant/placeOfBirth/create','value'=>$codedperson, 'id'=>$id));
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/search','id'=> $id));
            } 
    }
    //        submit citation
        if (isset($_POST['submit-citation'])) {
            $userid = Yii::app()->user->userid;
            $cite_attr_mapped = $_POST['recordid'];
            
//          changing status of mapped citation
            $model = TPcitationProfilefieldsMappings::model()->findByPk($cite_attr_mapped);
            $model->status = 'F';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            
        $this->redirect(array('dataEntry/Entrant/placeOfBirth/index_new'));
        }
    //        REJECT citation
        if (isset($_POST['cancel-citation'])) {
            $cite_attr_mapped = $_POST['recordid'];

//            changing status of citation
            $model = TPcitationProfilefieldsMappings::model()->findbypk($cite_attr_mapped);
            $model->status = 'R';
            $model->rejectedreason_dataEntry = $_POST['cancel-citation'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            
        $this->redirect(array('dataEntry/Entrant/placeOfBirth/index_new'));
        }
        
        
            $this->render('search', array(
            'model' => $this->loadSearchResult($results,$query,$person),
        ));
    }
    
    public function loadSearchResult($userid,$query,$person) { 
        $min_length = 2;
            if($query != NULL AND strlen($query) > $min_length){
              $results = TPersonplaceOfBirth::model()->findAll("city LIKE '%" . $query . "%' AND status = 'A' AND person = $person");
            } else{
                $results = NULL;
            }
        return $model = array($results,$query,$person);
    }
    
    public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        
        if (isset($_POST['personid'])) {
//            $citationmapped = $_POST['citationid'];
            $recordmapped = $_POST['recordid'];
            $code = new Encryption;
            $coded_id = $code->encode($recordmapped);
            
            $model = new TPersonplaceOfBirth();
            
            $model->city = $_POST['city'];
            $model->otherdetails = $_POST['details'];
            $model->person = $_POST['personid'];
            $model->citation = $_POST['citationid'];
            $model->maker = $userid;
            if($model->save()){
            } else{
                //log errors
            }
         $this->redirect(array('dataEntry/Entrant/placeOfBirth/search', 'id'=>$coded_id));
        }
         
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('dataEntry/Entrant/placeOfBirth/index_new'));
        }
        $this->render('create');
    }
}