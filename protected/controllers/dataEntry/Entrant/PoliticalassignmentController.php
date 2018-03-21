<?php

class PoliticalassignmentController extends Controller
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
            $model = TOrganizationcitationMapping::model()->findByPk($record_id);
            $model->status = 'T';
            $model->data_entrant = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }

		$this->render('index_new');
	}
        public function actionCorrectrejectedposition(){
            $code = new Encryption;
                //correct position
        if (isset($_POST['position-id-correct'])) {
            $citation_id_correct = $_POST['citation-id-correct'];
            $position_id_correct = $_POST['position-id-correct'];
            $posid = $code->encode($position_id_correct);
//            correcting position detail
            $model = TPersonpositions::model()->findByPk($position_id_correct); 
            $model->name = $_POST['position_name'];
            $model->level = $_POST['newvalue'];
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/Entrant/politicalassignment/correctrejectedposition' , 'id'=>$posid ));
        } 
//        submit corrected position
        if (isset($_POST['cposition_id'])) {
            $position_id = $_POST['cposition_id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'C'; //corrected
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
//        delete corrected position
        if (isset($_POST['delete-position-id'])) {
            $position_id = $_POST['delete-position-id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            if ($model->delete()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
//        discard supervised position
        if (isset($_POST['discard-supervision-id'])) {
            $position_id = $_POST['discard-supervision-id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'L'; //discard supervised position
            $model->dataEntrant_discard_reason = $_POST['discard-reason']; //discard reason
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
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
            $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
            
            $this->render('view_new');
	}
        
        public function actionSearch($id) { 

        $userid = Yii::app()->user->userid;
        $query = NULL;
        $organ = NULL;
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            $organ = $_POST['organ_search'];
            
        }
        if (isset($_POST['result'])) {
            $organn = $_POST['organ_search'];
            $nomatchname = $_POST['newname'];
            $code = new Encryption;
            $codedname = $code->encode($nomatchname);
            $codedorgan = $code->encode($organn);
            
            $usermatch = $_POST['result'];
            if ($usermatch == 2) {
//                 $this->redirect(array('dataEntry/Entrant/politicalassignment/create','value'=>$codedname,'name'=>$codedorgan));
            $this->redirect(array('dataEntry/Entrant/politicalassignment/search','id'=> $id));
            } else {
                //log error
                 $this->redirect(array('dataEntry/Entrant/politicalassignment/create','value'=>$codedname,'name'=>$codedorgan,'id'=>$id));
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/search','id'=> $id));
            } 
    }
    //        submit citation
        if (isset($_POST['submit-citation'])) {
            $userid = Yii::app()->user->userid;
            $record_id = $_POST['record-id-submit'];
            
//          changing status of mapped citation
            $model = TOrganizationcitationMapping::model()->findByPk($record_id);
            $model->status = 'F';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
    //        reject citation
        if (isset($_POST['cancel-citation'])) {
            $record_id = $_POST['record-id'];
//            $cancel = $_POST['record-id'];

//            changing status of citation
            $model = TOrganizationcitationMapping::model()->findbypk($record_id);
            $model->status = 'R';
            $model->rejectedreason_dataEntry = $_POST['reject-reason'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            
        $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
        
        
            $this->render('search', array(
            'model' => $this->loadSearchResult($userid,$query,$organ),
        ));
    }
    public function loadSearchResult($userid,$query,$organ) { 
        $min_length = 2;
//            LOG errors and redirect  
            if($query != NULL AND strlen($query) > $min_length){
                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status = 'A' AND organization='$organ'");
            }else{
                $results = NULL;
            }
        return $model = array($results,$query,$organ);
    }
//create page  
    public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        
           //adding position
        if (isset($_POST['position_name'])) {
            $record_id = $_POST['record-id'];
            $code = new Encryption;
            $coded_id = $code->encode($record_id);
            
            $model = new TPersonpositions;
            $model->name = $_POST['position_name'];
//            $model->program = $_POST['program'];
            $model->organization = $_POST['organisation'];
//            $model->organization = $organ_id;
            $model->citation = $_POST['citationid'];
            $model->level = $_POST['level'];
//            $model->weight = $_POST['weight'];
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
//                      
            $this->redirect(array('dataEntry/Entrant/politicalassignment/search', 'id'=>$coded_id));
        }
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('dataEntry/Entrant/politicalassignment/index_new'));
        }
        $this->render('create');
    }
//    
//#######################################################################################################################
//	public function actionView($id){
//        $pcode = new Encryption;
//        $position = $pcode->decode($id);
////           editing position
//        if (isset($_POST['position_name_new'])) {
//            $position_id = $_POST['position_id'];
//            $model = TPersonpositions::model()->findByAttributes(array('id' => $position_id));
//            $model->name = $_POST['position_name_new'];
//            $model->program = $_POST['program_new'];
//            $model->organization = $_POST['organisation_new'];
//            $model->level = $_POST['level_new'];
//            $model->weight = $_POST['weight_new'];
//            $model->start_date = $_POST['start_date_new'];
//            $model->end_date = $_POST['end_date_new'];
//            if ($model->update()) {
//                //log success
//            } else {
//                //log error
//            }
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/view', 'id' => $id));
//        }
//        //        adding purpose
//            if (isset($_POST['position_id'])) {
//            $model = new TPersonpositionpurpose;
//            $model->position = $_POST['position_id'];
//            $model->purpose = $_POST['purpose'];
//            if ($model->save()) {
//                //log success
//            } else {
//                //log error
//            }
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/view', 'id' => $id));
//        }
//        //        editing purpose
//            if (isset($_POST['purpose_new'])) {
//            $position_id = $_POST['position'];
//            $model = TPersonpositionpurpose::model()->findByAttributes(array('position' => $position_id));
//            $model->purpose = $_POST['purpose_new'];
//            if ($model->update()) {
//                //log success
//            } else {
//                //log error
//            }
//            $this->redirect(array('dataEntry/Entrant/politicalassignment/view', 'id' => $id));
//        }
////    submitting position
//        if (isset($_POST['position_id_submit'])) {
//            $position_id = $_POST['position_id_submit'];
//            $model = TPersonpositions::model()->findByPk($position_id);
//            $model->status = 'A';
//            if ($model->update()) {
//                //log success
//            } else {
//                //log error
//            }
//            $this->redirect(array('dataEntry/Entrant/politicalassignment'));
//        }
//		$this->render('view');
//	}
//
//	// Uncomment the following methods and override them if needed
//	/*
//	public function filters()
//	{
//		// return the filter configuration for this controller, e.g.:
//		return array(
//			'inlineFilterName',
//			array(
//				'class'=>'path.to.FilterClass',
//				'propertyName'=>'propertyValue',
//			),
//		);
//	}
//
//	public function actions()
//	{
//		// return external action classes, e.g.:
//		return array(
//			'action1'=>'path.to.ActionClass',
//			'action2'=>array(
//				'class'=>'path.to.AnotherActionClass',
//				'propertyName'=>'propertyValue',
//			),
//		);
//	}
//	*/
}