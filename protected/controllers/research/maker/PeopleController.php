<?php

class PeopleController extends Controller {

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
                'actions' => array('index', 'search', 'create', 'importedpeople', 'pview', 'importedView','viewAlerts','assessedImports',),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $userid = Yii::app()->user->userid;

        //        import people
        if (isset($_POST['importing'])) {
            $model = new TPersonImport();
            //path to the file
//        $this->pathToFile = Yii::getPathOfAlias('webroot') . '/uploads/pep/import.csv';
            $pathTo = CUploadedFile::getInstance($model, 'bulk-people');
            $pathToFile = $pathTo->getTempName();
//        $pathToFile = Yii::getPathOfAlias('webroot') . '/protected/uploads/pep/import.csv';    
            if (!file_exists($pathToFile) || !is_readable($pathToFile)) {
                
            }
            $data = array();
            if (($handle = fopen($pathToFile, 'r')) !== false) {
                $i = 0;
//            while (($row = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    $newmodel = new TPersonImport();
                    $newmodel->name = $row[0];
                    $newmodel->gender = $row[1];
                    $newmodel->nationality = $row[2];
                    $newmodel->maker = $userid;
                    if ($newmodel->validate()) {
                        $newmodel->save();
                    } else {
                        
                    }
                }
                fclose($handle);
            }
            $this->redirect(array('research/maker/people/importedpeople'));
        }
        

        $this->render('index', array(
            'model' => $this->loadModelList($userid),
        ));
    }

//       loading all newly created persons
    public function loadModelList($userid) {
//        $min_length = 3;
        $model = TPerson::model()->findAll("status = 'D' AND Maker = '$userid'");
        if ($model === NULL) {
//            LOG errors and redirect  
        } else {
            return $model;
        }
    }

//    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
        }
        if (isset($_POST['result'])) {
            $nomatchname = $_POST['newname'];
            $code = new Encryption;
            $codedname = $code->encode($nomatchname);
            $usermatch = $_POST['result'];
            if ($usermatch == 2) {
                $this->redirect(array('research/maker/people/create', 'value' => $codedname));
            } else {
                //log error
            }
            $this->redirect(array('research/maker/people/search'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TPerson::model()->findAll("Name LIKE '%" . $query . "%' AND status = 'A'");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    public function actionCreate() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
        //adding person
        if (isset($_POST['new-name-person'])) {
            $model = new TPerson;
            $model->name = $_POST['new-name-person'];
            $model->gender = $_POST['new-gender'];
            $model->maker = $userid;
            $model->nationality = $_POST['new-nationality'];
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/people'));
        }
        //        cancel creation
        if (isset($_POST['cancel-creation'])) {
            $cancel = $_POST['cancel-creation'];
            $this->redirect(array('research/maker/people'));
        }
        $this->render('create');
    }
// view page for person
    public function actionPview($id) {
        $userid = Yii::app()->user->userid;
        $pcode = new Encryption;
        $person = $pcode->decode($id);
        //add website citation for person
        if (isset($_POST['new-title-citation-person'])) {
            $model = new TPersonCitation();
            $model->title = $_POST['new-title-citation-person'];
            $model->type = $_POST['citation-type-person'];
            $model->authors = $_POST['new-author-person'];
            $model->publish_date = $_POST['new-date-published-person'];
            $model->url = $_POST['new-url-person'];
            $model->publisher = $_POST['new-publisher-person'];
            $model->ref_publisher = $_POST['new-ref-publisher-person'];
            $model->access_date = $_POST['new-date-accessed-person'];
            $model->person = $person;
            $model->status = 'P';
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/people/pview', 'id' => $id));
            //
        }
        //edit website person citation
        if (isset($_POST['edit-title-citation-person'])) {
            $citation = $_POST['website-citation-id-person'];
            $model = TPersonCitation::model()->findByPk($citation);
            $model->authors = $_POST['edit-author-person'];
            $model->title = $_POST['edit-title-citation-person'];
            $model->url = $_POST['edit-url-person'];
            $model->publisher = $_POST['edit-publisher-person'];
            $model->ref_publisher = $_POST['edit-ref-publisher-person'];
            $model->access_date = $_POST['edit-date-accessed-person'];
            $model->publish_date = $_POST['edit-date-published-person'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/people/pview', 'id' => $id));
        }

//            submitting person
        if (isset($_POST['submit-person-id'])) {
            $person_id = $_POST['submit-person-id'];
            $model = TPerson::model()->findByPk($person_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('research/maker/people'));
        }

        $this->render('pview', array(
            'model' => $this->loadModel($id),
        ));
    }

    //load people
    public function loadModel($id) {

        $person = TPerson::model()->findByPk($id);
        if ($person === NULL) {
            //LOG errors and redirect  
        } else {
            $pcitations = TPersonCitation::model()->findAll("Person = $person->id");
            return $model = array($person, $pcitations);
        }
    }

    
    public function actionImportedpeople() {
        $userid = Yii::app()->user->userid;
        //submit no matches
        if (isset($_POST['resolve-imported-people'])) {
            $resolve = $_POST['resolve-imported-people'];
            
            if (!empty($resolve)) {
            $this->redirect(array('research/maker/people/importedView'));
            } else {
                //log error
            }
        }

         $this->render('importedpeople', array(
            'model' => $this->loadImportModel($userid),
        ));
    }
    
//       loading all newly imported persons
    public function loadImportModel($userid) {
        $model = TPersonImport::model()->findAll("status='N' AND Maker = '$userid'");
        if ($model === NULL) {
//            LOG errors and redirect  
        } else {
            return $model;
        }
    }
    
//    imported people that are alerts
    public function actionImportedView() {
        $userid = Yii::app()->user->userid;
            
        if (isset($_POST['person-confirm-id'])) {
        $id = $_POST['person-confirm-id'];
        $model = TPersonImport::model()->findByPk($id);
        $model->status = 'A';
        if ($model->update()) {
            //log success
        } else {
            //log error
        }
        $this->redirect(array('research/maker/people/importedView'));
    }
        if (isset($_POST['completed_alerts'])) {
        $finish = $_POST['completed_alerts'];
        if (!empty($finish)) {
            //log success
        } else {
            //log error
        }
        $this->redirect(array('research/maker/people/assessedImports'));
    }
            $this->render('importedView', array(
            'model' => $this->loadMatches($userid),
        ));
    }
    
    //    loading any matches between newly imported and already existing people
    public function loadMatches($userid) {
       $existingNames = TPerson::model()->findAll("status='A'");  
       $newNames = TPersonImport::model()->findAll("status='N' AND Maker = '$userid'");

         return $model = array($existingNames,$newNames);
    }
    
    public function actionViewAlerts() {
        $userid = Yii::app()->user->userid;
            
        if (isset($_POST['alertresult'])) {
            $person_alert_id = $_POST['person-alert-id'];
            $usermatch = $_POST['alertresult'];
            $model = TPersonImport::model()->findByPk($person_alert_id);
            if ($usermatch == 2 ) {
                $model->status = 'A';
                if ($model->update()) {
                    //log success
                } else {
                    //log error
                }
            }    else {
                 $model->status = 'C';
                if ($model->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('research/maker/people/importedView'));
        }
        $this->render('viewAlerts');
    }
    
    public function actionAssessedImports() {
        $userid = Yii::app()->user->userid;
        
        if (isset($_POST['import-people'])) {   
            $importpeople = $_POST['import-people'];
            $model = new TPerson();
            $model->Name = $_POST['import-name'];
            $model->Nationality = $_POST['import-nationality'];
            $model->Gender = $_POST['import-gender'];
            $model->Maker = $userid;
            if ($model->save()) {
            } else{
//             log error
            }
            $this->redirect(array('research/maker/people'));
            }         
        
         $this->render('assessedImports', array(
            'model' => $this->loadAssessedImports($userid),
        ));
    }
    
        //    loading assessed imports and are 
    public function loadAssessedImports($userid) {
       $approved = TPersonImport::model()->findAll("status='A' AND Maker = '$userid'");
       $closed = TPersonImport::model()->findAll("status='C' AND Maker = '$userid'");

         return $model=array($approved,$closed);
    }
}

//        
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