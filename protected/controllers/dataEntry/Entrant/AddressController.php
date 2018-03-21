<?php

class AddressController extends Controller
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
            $this->redirect(array('dataEntry/Entrant/address/index_new'));
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
            $this->redirect(array('dataEntry/Entrant/address/search','id'=> $id));
            } else {
                //log error
                 $this->redirect(array('dataEntry/Entrant/address/create','value'=>$codedperson, 'id'=>$id));
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
            
        $this->redirect(array('dataEntry/Entrant/address/index_new'));
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
            
        $this->redirect(array('dataEntry/Entrant/address/index_new'));
        }
        
        
            $this->render('search', array(
            'model' => $this->loadSearchResult($results,$query,$person),
        ));
    }
    
    public function loadSearchResult($userid,$query,$person) { 
        $min_length = 2;
            if($query != NULL AND strlen($query) > $min_length){
              $results = TPersonAddress::model()->findAll("city LIKE '%" . $query . "%' AND status = 'A' AND person = $person");
            } else{
                $results = NULL;
            }
        return $model = array($results,$query,$person);
    }
    //  creation page
        public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        
        if (isset($_POST['personid'])) {
//            $citationmapped = $_POST['citationid'];
            $recordmapped = $_POST['recordid'];
            $code = new Encryption;
            $coded_id = $code->encode($recordmapped);
            
            $model = new TPersonAddress();
            $model->type = $_POST['addresstypes'];
            $model->ownership = $_POST['ownership'];
            $model->country = $_POST['country'];
            $model->city = $_POST['city'];
            $model->town = $_POST['town'];
            $model->county = $_POST['county'];
            $model->subcounty = $_POST['sub-county'];
            $model->parish = $_POST['parish'];
            $model->village = $_POST['village'];
            $model->street_name = $_POST['street-name'];
            $model->apartment_number = $_POST['apartment-number'];
            $model->postal_code = $_POST['postal-code'];
            $model->otherdetails = $_POST['details'];
            $model->person = $_POST['personid'];
            $model->citation = $_POST['citationid'];
            $model->start_date = $_POST['start-date'];
            $model->end_date = $_POST['end-date'];
            $model->maker = $userid;
            if($model->save()){
            } else{
                //log errors
            }
         $this->redirect(array('dataEntry/Entrant/address/search', 'id'=>$coded_id));
        }
         
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('dataEntry/Entrant/address/index_new'));
        }
        $this->render('create');
    }
    
       public function actionCorrectrejectedaddress(){
            $code = new Encryption;
                //correct position
        if (isset($_POST['address_id_correct'])) {
            $addressid = $_POST['address_id_correct'];
            $code = new Encryption;
            $address_id = $code->encode($addressid);
            
            $model = TPersonAddress::model()->findByPk($addressid);
            $model->type = $_POST['addresstypescorrect'];
            $model->ownership = $_POST['ownershipcorrect'];
            $model->country = $_POST['countrycorrect'];
            $model->city = $_POST['citycorrect'];
            $model->town = $_POST['towncorrect'];
            $model->county = $_POST['countycorrect'];
            $model->subcounty = $_POST['sub-countycorrect'];
            $model->parish = $_POST['parishcorrect'];
            $model->village = $_POST['villagecorrect'];
            $model->street_name = $_POST['street-namecorrect'];
            $model->apartment_number = $_POST['apartment-numbercorrect'];
            $model->postal_code = $_POST['postal-codecorrect'];
            $model->otherdetails = $_POST['detailscorrect'];
            $model->start_date = $_POST['start-datecorrect'];
            $model->end_date = $_POST['end-datecorrect'];
            
            if($model->update()){
            } else{
                //log errors
            }
        $this->redirect(array('dataEntry/Entrant/address/correctrejectedaddress' , 'id'=>$address_id ));
        } 
//        submit corrected position
        if (isset($_POST['submit-supervision-id'])) {
            $address_id_submit = $_POST['submit-supervision-id'];
            $model = TPersonAddress::model()->findByPk($address_id_submit);
            $model->status = 'C'; //discard supervised position
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/address/index_new'));
        }
//        delete corrected position
        if (isset($_POST['delete-address-id'])) {
            $address_id_delete = $_POST['delete-address-id'];
            $model = TPersonAddress::model()->findByPk($address_id_delete);
            $model->status = 'X'; //discard supervised position
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/address/index_new'));
        }
//        discard supervised position
        if (isset($_POST['discard-supervision-id'])) {
            $address_id_discard = $_POST['discard-supervision-id'];
            $model = TPersonAddress::model()->findByPk($address_id_discard);
            $model->status = 'L'; //discard supervised position
            $model->dataEntrant_discard_reason = $_POST['discard-reason']; //discard reason
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/address/index_new'));
        }
            
            $this->render('correctrejectedaddress');
        }
}