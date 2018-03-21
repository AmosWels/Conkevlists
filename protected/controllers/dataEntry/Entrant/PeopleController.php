<?php

class PeopleController extends Controller
{
	public function actionIndex()
	{               
		$this->render('index');
	}
	public function actionView($id)
	{
            $pcode = new Encryption;
            $person_id = $pcode->decode($id);
//            edit profile
            if (isset($_POST['person_name'])) {
            $model = TPerson::model()->findByPk($person_id);
            $model->Name = $_POST['person_name'];
            $model->Nationality = $_POST['person_nationality'];
            $model->Gender = $_POST['person_gender'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/people/view', 'id' => $id));
        }
//        adding employment
            if (isset($_POST['position_details'])) {
                $position = $_POST['position'];
                $details = $_POST['position_details'];
                $startdate = $_POST['position_startdate'];
                $enddate = $_POST['position_enddate'];
                
            $model = new TPersonEmploymentDetails();
            $model->person = $person_id;
            $model->person_position = $position;
            $model->details = $details;
            $model->start_date = $startdate;
            $model->end_date = $enddate;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/people/view', 'id' => $id));
        }
//        editing employment
            if (isset($_POST['position_details_new'])) {
            $person_id = $_POST['person_id'];
            $model = TPersonEmploymentDetails::model()->findByAttributes(array('person' => $person_id));
            $model->person = $person_id;
            $model->person_position = $_POST['position_new'];
            $model->details = $_POST['position_details_new'];
            $model->start_date = $_POST['position_startdate_new'];
            $model->end_date = $_POST['position_enddate_new'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/people/view', 'id' => $id));
        }
//        editing profile
            if (isset($_POST['person_name_new'])) {
            $person_id = $_POST['person_id'];
            $model = TPerson::model()->findByAttributes(array('id' => $person_id));
            $model->Name = $_POST['person_name_new'];
            $model->Nationality = $_POST['person_nationality_new'];
            $model->Gender = $_POST['person_gender_new'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/people/view', 'id' => $id));
        }
        //            submitting person
        if (isset($_POST['person-id'])) {
            $person_id = $_POST['person-id'];
            $model = TPerson::model()->findByPk($person_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/Entrant/people'));
        }
		$this->render('view');
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