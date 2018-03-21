<?php

class EmploymentController extends Controller
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
            $cite_attr_id = $_POST['record-id'];
            $model = TPcitationProfilefieldsMappings::model()->findByPk($cite_attr_id);
            $model->status = 'T';
            $model->data_entrant = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }

		$this->render('index_new');
	}
        public function actionCorrectrejectedposition(){
            $code = new Encryption;
                //correct position
        if (isset($_POST['employment_id_correct'])) {
            $employment_id_correct = $_POST['employment_id_correct'];
            $employid = $code->encode($employment_id_correct);
//            correcting position detail
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id_correct); 
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/Entrant/employment/correctrejectedposition' , 'id'=>$employid ));
        } 
//        submit corrected position
        if (isset($_POST['submit-supervision-id'])) {
            $employment_id_submit = $_POST['submit-supervision-id'];
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id_submit);
            $model->status = 'C'; //discard supervised position
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
//        delete corrected position
        if (isset($_POST['delete-employment-id'])) {
            $employment_id_delete = $_POST['delete-employment-id'];
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id_delete);
            if ($model->delete()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
//        discard supervised position
        if (isset($_POST['discard-supervision-id'])) {
            $employment_id_discard = $_POST['discard-supervision-id'];
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id_discard);
            $model->status = 'L'; //discard supervised position
            $model->dataEntrant_discard_reason = $_POST['discard-reason']; //discard reason
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
            
            $this->render('correctrejectedposition');
        }
        
	public function actionView_new($id)
	{
            $pcode = new Encryption;
            $position = $pcode->decode($id);  
            
            if (isset($_POST['position_id_submit_new'])) {
            $position_id = $_POST['position_id_submit_new'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
            
            $this->render('view_new');
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
            $this->redirect(array('dataEntry/Entrant/employment/search','id'=> $id));
            } else {
                //log error
                 $this->redirect(array('dataEntry/Entrant/employment/organisationSelect','value'=>$codedperson, 'id'=>$id));
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/search','id'=> $id));
            } 
    }
    //        submit citation
        if (isset($_POST['submit-citation'])) {
            $userid = Yii::app()->user->userid;
            $cite_attr_mapped = $_POST['record_id'];
            $cancel = $_POST['submit-citation'];
            
//          changing status of mapped citation
            $model = TPcitationProfilefieldsMappings::model()->findByPk($cite_attr_mapped);
            $model->status = 'F';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            
        $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
    //        REJECT citation
        if (isset($_POST['cancel-citation'])) {
            $cite_attr_mapped = $_POST['record_id'];
            $cancel = $_POST['cancel-citation'];

//            changing status of citation
            $model = TPcitationProfilefieldsMappings::model()->findbypk($cite_attr_mapped);
            $model->status = 'R';
            $model->rejectedreason_dataEntry = $_POST['cancel-citation'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            
        $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
        
            $this->render('search', array(
            'model' => $this->loadSearchResult($results,$query,$person),
        ));
    }
    
    public function loadSearchResult($userid,$query,$person) { 
        $min_length = 2;
            if($query != NULL AND strlen($query) > $min_length){
             $personemployment = TPersonEmploymentDetails::model()->findAll("person = $person and status='A'"); // getting all positions that the person holds
                
                if(!empty($personemployment)){
                $positions = '';
                foreach($personemployment as $employment){
                        $positions .= $employment->person_position . ' ,';
                        }
                        $positions_held_ids = rtrim($positions, ' ,'); //array of all positions ids that the person holds
                        $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status = 'A' and id IN($positions_held_ids)");
                         } else{ $results = NULL; }
            } else{
                $results = NULL;
            }
        return $model = array($results,$query,$person);
    }
    
//    load organisations that are active
    public function actionOrganisationSelect() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['orgquery'])) {
            $query = $_POST['orgquery'];
        }
//        capture user decision
//        if (isset($_POST['result'])) {
//            $nomatchname = $_POST['newname'];
//            $code = new Encryption;
//            $codedname = $code->encode($nomatchname);
//
//            $usermatch = $_POST['result'];
//
//            if ($usermatch == 2) {
//                $this->redirect(array('dataEntry/maker/organisation', 'value' => $codedname));
//            } else {
//                //log error
//            }
//            $this->redirect(array('dataEntry/maker/organisation'));
//        }
        $this->render('organisationSelect', array(
            'model' => $this->loadorganisations($userid, $query),
        ));
    }
    
    public function actionOrganisationPositions() {
        $userid = Yii::app()->user->userid;
          //adding Employment
        if (isset($_POST['personid'])) {
            $citationmapped = $_POST['citationid'];
            $person_attr_record = $_POST['record_id'];
            $code = new Encryption;
            $coded_id = $code->encode($person_attr_record);
            
            $model = new TPersonEmploymentDetails();
            $model->person = $_POST['personid'];
            $model->person_position = $_POST['position_id'];
            $model->citation = $citationmapped;
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/employment/search', 'id'=>$coded_id));
        }
        
        $this->render('organisationpositions');
    }
    
//   search function and loading the organisations for new employment
    public function loadorganisations($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'A'");
        } else { 
            $results = NULL;
        }
        return $model = array($results, $query);
    }
    ######
    
//  creation page
        public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        
         
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('dataEntry/Entrant/employment/index_new'));
        }
        $this->render('create');
    }
}