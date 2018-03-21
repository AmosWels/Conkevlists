<?php

class PoliticalassignmentController extends Controller
{
	public function actionIndex()
	{
            $userid = Yii::app()->user->userid;
            //    take up citation
        if (isset($_POST['position-id'])) {
            $position_id = $_POST['position-id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'T';
            $model->supervisor = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/politicalassignment'));
        }
		$this->render('index');
	}
        public function actionSupervise()
        {
//            approve a position
         if (isset($_POST['position_id_approve'])) {
            $position_id = $_POST['position_id_approve'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/politicalassignment'));
        }
//            reject a position
         if (isset($_POST['rejectposition-id'])) {
            $position_id = $_POST['rejectposition-id'];
            $model = TPersonpositions::model()->findByPk($position_id);
            $model->supervisor_reject_reason = $_POST['reject-reason'];
            $model->status = 'R';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/politicalassignment'));
        }
            
                $this->render('supervise');
        }

}