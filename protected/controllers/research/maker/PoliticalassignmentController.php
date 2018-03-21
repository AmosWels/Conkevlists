<?php

class PoliticalassignmentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        public function actionSearch() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
        $organ = NULL;
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            $organ = $_POST['organ_search'];
        }
        if (isset($_POST['result'])) {
            $nomatchname = $_POST['newname'];
            $code = new Encryption;
            $codedname = $code->encode($nomatchname);
            
            $usermatch = $_POST['result'];
            if ($usermatch == 2) {
                 $this->redirect(array('research/maker/politicalassignment/create','value'=>$codedname));
            } else {
                //log error
            } 
            $this->redirect(array('research/maker/politicalassignment/search'));
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
    public function actionCreate() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
           //adding person
        if (isset($_POST['position_name'])) {
            $model = new TPersonpositions;
            $model->name = $_POST['position_name'];
            $model->program = $_POST['program'];
            $model->organization = $_POST['organisation'];
            $model->level = $_POST['level'];
            $model->weight = $_POST['weight'];
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/politicalassignment'));
        }
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
        $this->redirect(array('research/maker/politicalassignment'));
        }
        $this->render('create');
    }
    public function actionView($id){
        $pcode = new Encryption;
        $position = $pcode->decode($id);
        //add website citation for person
        if (isset($_POST['new-title-citation-position'])) {
            $model = new TPositionCitation();
            $model->Title = $_POST['new-title-citation-position'];
            $model->Type = $_POST['citation-type-position'];
//          $model->organization = $organization;
            $model->Authors = $_POST['new-author-position'];
            $model->Publish_date = $_POST['new-date-published-position'];
            $model->Url = $_POST['new-url-position'];
            $model->Publisher = $_POST['new-publisher-position'];
            $model->Ref_publisher = $_POST['new-ref-publisher-position'];
            $model->Access_date = $_POST['new-date-accessed-position'];
            $model->Position = $position;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/politicalassignment/view', 'id' => $id));
        //
        }
         //edit website position citation
        if (isset($_POST['edit-title-citation-position'])) {
            $citation = $_POST['website-citation-id-position'];
            $model = TPositionCitation::model()->findByPk($citation);
            $model->Authors = $_POST['edit-author-position'];
            $model->Title = $_POST['edit-title-citation-position'];
            $model->Url = $_POST['edit-url-position'];
            $model->Publisher = $_POST['edit-publisher-position'];
            $model->Ref_publisher = $_POST['edit-ref-publisher-position'];
            $model->Access_date = $_POST['edit-date-accessed-position'];
            $model->Publish_date = $_POST['edit-date-published-position'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/politicalassignment/view', 'id' => $id));
        }
        //mapping profiles citations
        if (isset($_POST['citation-profilefields-mapping'])) {
            $profilefields_count = $_POST['profilefields-count'];
            $citation = $_POST['citation-id'];
            $first_selection = $_POST['first_profile_mapping'];

            $p = 1;
            $field_selection = "";
            while ($p <= $profilefields_count) {
                if (!empty($_POST['profileField' . $p])) {
                    $field_selection .= $_POST['profileField' . $p] . ',';
                } $p++;
            }
            $selection = rtrim($field_selection, ',');
            $profile_selection = explode(',', $first_selection); //first old time selection
            $profilefields_array = explode(',', $selection); //current new time selection
            //adding profile mapping
            foreach ($profilefields_array as $array_item) {
                if (!in_array("$array_item", $profile_selection)) {

                    $model = new TPositioncitationProfilefieldsMappings();
                    $model->citation = $citation;
                    $model->profilefield = $array_item;
                    $model->save();
                }
            }
            //removing profile existing mapping
            foreach ($profile_selection as $profile_selectionchange) {
                if (!in_array("$profile_selectionchange", $profilefields_array)) {

                    $model2 = TPositioncitationProfilefieldsMappings::model()->findByAttributes(
                            array('citation' => $citation, 'profilefield' => $profile_selectionchange));
                    if (!empty($model2)) {
                        $model2->delete();
                    }
                }
            }
            $this->redirect(array('research/maker/politicalassignment/view', 'id' => $id));
        }
        //            submitting position
        if (isset($_POST['submit-position-id'])) {
            $position_id = $_POST['submit-position-id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'N';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/politicalassignment'));
        }
		$this->render('view');
	}
	
}