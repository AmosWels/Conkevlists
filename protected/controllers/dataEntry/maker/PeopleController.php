<?php

class PeopleController extends Controller
{
	public function actionIndex(){
	$userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['orgquery'])) {
            $query = $_POST['orgquery'];
        }
//        capture user decision
        if (isset($_POST['result'])) {
            $nomatchname = $_POST['newname'];
            $code = new Encryption;
            $codedname = $code->encode($nomatchname);

            $usermatch = $_POST['result'];

            if ($usermatch == 2) {
                $this->redirect(array('dataEntry/maker/people', 'value' => $codedname));
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/maker/people'));
        }
        $this->render('index', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
	}
        
        //   search function and loading the results
    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TPerson::model()->findAll("name LIKE '%" . $query . "%' AND status = 'A'");
        } else { 
            $results = NULL;
        }
        return $model = array($results, $query);
    }
        
//        where all draft and rejected are
	public function actionIndex_new(){
		$this->render('index_new');
	}
//       view the person and the citation       
        public function actionView($id) {
        $userid = Yii::app()->user->userid;
        $code = new Encryption;
        $person = $code->decode($id);
        //add website citation
        if (isset($_POST['new-title-citation'])) {
            $model = new TPersonCitation;            
            $model->type = $_POST['citation-type'];
            $model->person = $person;
            $model->authors = $_POST['new-author'];
            $model->publish_date = $_POST['new-date-published'];
            $model->title = $_POST['new-title-citation'];
            $model->url = $_POST['new-url'];
            $model->publisher = $_POST['new-publisher'];
            $model->ref_publisher = $_POST['new-ref-publisher'];
            $model->access_date = $_POST['new-date-accessed'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/maker/people/view','id'=>$id));
        }

        $this->render('view');
    }
    
        public function actionViewcitation($id) {
        $userid = Yii::app()->user->userid;
        $code = new Encryption;
//        $organization = $code->decode($id);
//        $organization = $code->decode(org_id);
        //edit website citation
        if (isset($_POST['edit-title-citation'])) {
            $citation_id = $_POST['website-citation-id'];
            $model = TPersonCitation::model()->findByPk($citation_id); 
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
        $this->redirect(array('dataEntry/maker/people/viewCitation','id'=>$id));
        }
        
        //mapping citation
        if (isset($_POST['map-citation'])) {
            
                $person = $_POST['person_id'];
                $citation_id = $_POST['map-citation'];
                $items_count = $_POST['items-count'];
                $previous_selection = $_POST['old-mapping-set'];

                $r = 1;
                $item_selection = "";
                while ($r <= $items_count) {
                    if (!empty($_POST['research' . $r])) {
                        $item_selection .= rtrim($_POST['research' . $r] . ',');
                    } $r++;
                    
                }

                $old_selections = explode(',', $previous_selection);
                $new_selections = explode(',', $item_selection);

                //             adding non existing mapping
                foreach ($new_selections as $new_selection) {
                    if (!in_array("$new_selection", $old_selections)) {

                        $model = new TPcitationProfilefieldsMappings;
                        $model->person = $person;
                        $model->citation = $citation_id;
                        $model->profilefield = $new_selection;
                        $model->maker = $userid;
                        $model->save();
                    }
                }

                //              removing existing mapping
                foreach ($old_selections as $old_selection) {
                    if (!in_array("$old_selection", $new_selections)) {

                        $model3 = TPcitationProfilefieldsMappings::model()->findByAttributes(
                                array('citation' => $citation_id, 'profilefield' => $old_selection));
                        $model3->status = 'X';
                        if(!empty($model3)){ $model3->update(); }
                    }
                }
            
            $this->redirect(array('dataEntry/maker/people/viewCitation','id'=>$id));
        }
//        delete citation
        if (isset($_POST['delete-citation-id'])) {  
            $person_id = $_POST['person-id'];
            $personiz = $code->encode($person_id);
            
            $citation_id = $_POST['delete-citation-id'];
            $record = TPersonCitation::model()->findByPk($citation_id);
            $record->status = 'X';
            if(!empty($record)){
                 $record->update(); 
            } else {}
//            deleting the citation mapping
            $mappings = TPcitationProfilefieldsMappings::model()->findAll("citation = $citation_id");
            if(!empty($mappings)){
                foreach ($mappings as $map){
                 $map->status = 'X';
                 $map->update(); 
              }
            } else{}
            $this->redirect(array('dataEntry/maker/people/view','id'=>$personiz));
        }
//        discard citation
        if (isset($_POST['discard-supervision-id'])) {
            $org_id_discard = $_POST['organ-id-discard'];
            $organiz = $code->encode($org_id_discard);
            
            $citation_id_discard = $_POST['discard-supervision-id'];
            $record = TPersonCitation::model()->findByPk($citation_id_discard);
            if(!empty($record)){
                $record->status = 'L';
                $record->discard_reason_researcher = $_POST['discard-reason'];
                $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/people/view','id'=>$organiz));
        }
//        submit citation
        if (isset($_POST['submit-citation-id'])) {  
            $person_id_submit = $_POST['person-id-submit'];
            $personiz = $code->encode($person_id_submit);
            
            $citation_id_submit = $_POST['submit-citation-id'];
            $record = TPersonCitation::model()->findByPk($citation_id_submit);
            if(!empty($record)){
                $record->status = 'N';
                 $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/people/view','id'=>$personiz));
        }
//        correct citation
        if (isset($_POST['submit-corrected-citation-id'])) {
            $org_id_correct = $_POST['organ-id-correct'];
            $personiz = $code->encode($org_id_correct);
            
            $citation_id_correct = $_POST['submit-corrected-citation-id'];
            $record = TPersonCitation::model()->findByPk($citation_id_correct);
            if(!empty($record)){
                $record->status = 'C';
                $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/people/view','id'=>$personiz));
        }
        
          //cancelling the correction
        if (isset($_POST['cancel-citation-id'])) {
            $this->redirect(array('dataEntry/maker/people/index_new'));
        }
        
        $this->render('viewCitation');
    }
    
    	public function actionCorrect_citation(){
            $code = new Encryption;
                    //edit website citation
        if (isset($_POST['edit-title-citation-correct'])) {
            $record_id = $_POST['record-id'];
            $record = $code->encode($record_id);
            
            $citation_id = $_POST['website-citation-id-correct'];
            $model = TPersonCitation::model()->findByPk($citation_id); 
            $model->authors = $_POST['edit-author-correct'];
            $model->publish_date = $_POST['edit-date-published-correct'];
            $model->title = $_POST['edit-title-citation-correct'];
            $model->url = $_POST['edit-url-correct'];
            $model->publisher = $_POST['edit-publisher-correct'];
            $model->ref_publisher = $_POST['edit-ref-publisher-correct'];
            $model->access_date = $_POST['edit-date-accessed-correct'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/maker/people/correct_citation','id'=>$record));
        }
            //        delete citation
        if (isset($_POST['delete-record-id-rejected'])) {  
            $recordid = $_POST['delete-record-id-rejected'];
            
//            deleting the citation mapping
            $model = TPcitationProfilefieldsMappings::model()->findByPk($recordid);
            $model->status = 'X';
                if($model->update()){
                 //log success
            } else{
                //log errors
            }
            $this->redirect(array('dataEntry/maker/people/index_new'));
        }
//        discard citation
        if (isset($_POST['discard-supervision-id'])) {
            
            $record = $_POST['discard-supervision-id'];
            $model = TPcitationProfilefieldsMappings::model()->findByPk($record);
                $model->status = 'L';
                $model->discard_reason_researcher = $_POST['discard-reason'];
            if($model->update()){
                //log success
            } else{
                //log error
            }
            $this->redirect(array('dataEntry/maker/people/index_new'));
        }
//        submit citation
        if (isset($_POST['submit-corrected-citation-id'])) {  
                        
            $record= $_POST['submit-corrected-citation-id'];
            $model = TPcitationProfilefieldsMappings::model()->findByPk($record);
            $model->status = 'C';
            if($model->update()){
                 //log success
            } else{
                //log error
            }
            $this->redirect(array('dataEntry/maker/people/index_new'));
        }
        
         //cancelling the correction
        if (isset($_POST['cancel-citation-id'])) {
            $this->redirect(array('dataEntry/maker/people/index_new'));
        }
		$this->render('correct_citation');
	}
        
	public function actionText()
	{
		$this->render('text');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}