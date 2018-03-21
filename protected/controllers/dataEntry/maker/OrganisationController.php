<?php

class OrganisationController extends Controller {

    public function actionIndex() {
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
                $this->redirect(array('dataEntry/maker/organisation', 'value' => $codedname));
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/maker/organisation'));
        }
        $this->render('index', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }
    
    public function actionIndex_new() {
        
        $this->render('index_new');
    }
    
//   search function and loading the results
    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'A'");
        } else { 
            $results = NULL;
        }
        return $model = array($results, $query);
    }
    
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
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
        $this->redirect(array('dataEntry/maker/organisation/view','id'=>$id));
        }

        $this->render('view');
    }
    public function actionViewcitation($id) {
        $code = new Encryption;
        $userid = Yii::app()->user->userid;
//        $organization = $code->decode($id);
//        $organization = $code->decode(org_id);
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
        $this->redirect(array('dataEntry/maker/organisation/viewCitation','id'=>$id));
        }
        
        //mapping citation
        if (isset($_POST['map-citation'])) {
            
                $organization = $_POST['org_id'];
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

                        $model = new TOrganizationcitationMapping;
                        $model->organization = $organization;
                        $model->citation = $citation_id;
                        $model->research = $new_selection;
                        $model->maker = $userid;
                        $model->save();
                    }
                }

                //              removing existing mapping
                foreach ($old_selections as $old_selection) {
                    if (!in_array("$old_selection", $new_selections)) {

                        $model3 = TOrganizationcitationMapping::model()->findByAttributes(
                                array('citation' => $citation_id, 'research' => $old_selection));
                        if(!empty($model3)){ $model3->delete(); }
                    }
                }
            
            $this->redirect(array('dataEntry/maker/organisation/viewCitation','id'=>$id));
        }
//        delete citation
        if (isset($_POST['delete-citation-id'])) {
            $org_id = $_POST['organ-id'];
            $organiz = $code->encode($org_id);
            
            $citation_id = $_POST['delete-citation-id'];
            $record = TOrganizationCitation::model()->findByPk($citation_id);
            $record->status = 'X';
            if(!empty($record)){
                 $record->update(); 
            } else{ }
//            deleting the citation mapping
            $mappings = TOrganizationcitationMapping::model()->findAll("citation = $citation_id");
            if(!empty($mappings)){
                foreach ($mappings as $map){
                 $map->status = 'X';
                 $map->update();  
              }
            }
            $this->redirect(array('dataEntry/maker/organisation/view','id'=>$organiz));
        }
//        discard citation
        if (isset($_POST['discard-supervision-id'])) {
            $org_id_discard = $_POST['organ-id-discard'];
            $organiz = $code->encode($org_id_discard);
            
            $citation_id_discard = $_POST['discard-supervision-id'];
            $record = TOrganizationCitation::model()->findByPk($citation_id_discard);
            if(!empty($record)){
                $record->status = 'L';
                $record->discard_reason_researcher = $_POST['discard-reason'];
                $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/organisation/view','id'=>$organiz));
        }
//        submit citation
        if (isset($_POST['submit-citation-id'])) {
            $org_id_submit = $_POST['organ-id-submit'];
            $organiz = $code->encode($org_id_submit);
            
            $citation_id_submit = $_POST['submit-citation-id'];
            $record = TOrganizationCitation::model()->findByPk($citation_id_submit);
            if(!empty($record)){
                $record->status = 'N';
                $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/organisation/view','id'=>$organiz));
        }
//        correct citation
        if (isset($_POST['submit-corrected-citation-id'])) {
            $org_id_correct = $_POST['organ-id-correct'];
            $organiz = $code->encode($org_id_correct);
            
            $citation_id_correct = $_POST['submit-corrected-citation-id'];
            $record = TOrganizationCitation::model()->findByPk($citation_id_correct);
            if(!empty($record)){
                $record->status = 'C';
                $record->update(); 
            }
            $this->redirect(array('dataEntry/maker/organisation/view','id'=>$organiz));
        }
                //cancelling the correction
        if (isset($_POST['cancel-citation-id'])) {
            $this->redirect(array('dataEntry/maker/organisation/index_new'));
        }
        
        $this->render('viewCitation');
    }
    
    public function actionCorrect_citation(){
            $code = new Encryption;
                    //edit website citation
        if (isset($_POST['website-citation-id-correct'])) {
            $citation_id = $_POST['website-citation-id-correct'];
            $record_id = $_POST['record-id'];
            $record = $code->encode($record_id);
            
            $model = TOrganizationCitation::model()->findByPk($citation_id); 
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
        $this->redirect(array('dataEntry/maker/organisation/correct_citation','id'=>$record));
        }
//        delete citation
        if (isset($_POST['delete-record-id'])) {
            $record_id = $_POST['delete-record-id'];
            
            $model = TOrganizationcitationMapping::model()->findByPk($record_id);
            $model->status = 'X';
                if($model->update()){
                 //log success
            } else{
                //log errors
            }
            $this->redirect(array('dataEntry/maker/organisation/index_new'));
        }
        
//        discard citation
        if (isset($_POST['discard-supervision-id'])) {
            $record = $_POST['discard-supervision-id'];
            $model = TOrganizationcitationMapping::model()->findByPk($record);
                $model->status = 'L';
                $model->discard_reason_researcher = $_POST['discard-reason'];
            if($model->update()){
                //log success
            } else{
                //log error
            }
            $this->redirect(array('dataEntry/maker/organisation/index_new'));
        }
//        submit citation
        if (isset($_POST['submit-corrected-citation-id'])) {  
                        
            $record= $_POST['submit-corrected-citation-id'];
            $model = TOrganizationcitationMapping::model()->findByPk($record);
            $model->status = 'C';
            if($model->update()){
                 //log success
            } else{
                //log error
            }
            $this->redirect(array('dataEntry/maker/organisation/index_new'));
        }
        //cancelling the correction
        if (isset($_POST['cancel-citation-id'])) {
            $this->redirect(array('dataEntry/maker/organisation/index_new'));
        }
		$this->render('correct_citation');
	}

 }
