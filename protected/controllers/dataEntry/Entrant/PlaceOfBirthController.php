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