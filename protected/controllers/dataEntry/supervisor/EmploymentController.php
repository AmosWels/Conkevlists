<?php

class EmploymentController extends Controller
{
	public function actionIndex()
	{
            $userid = Yii::app()->user->userid;
            
            //    take up citation
        if (isset($_POST['employment-id'])) {
            $position_id = $_POST['employment-id'];
            $model = TPersonEmploymentDetails::model()->findByPk($position_id);
            $model->status = 'T';
            $model->supervisor = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/employment'));
        }
		$this->render('index');
	}
        public function actionSupervise()
        {
//            approve an employment
         if (isset($_POST['employment_id_approve'])) {
            $employment_id = $_POST['employment_id_approve'];
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/employment'));
        }
//            reject an employment
         if (isset($_POST['rejectemployment-id'])) {
            $employment_id = $_POST['rejectemployment-id'];
            $model = TPersonEmploymentDetails::model()->findByPk($employment_id);
            $model->supervisor_reject_reason = $_POST['reject-reason'];
            $model->status = 'R';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('dataEntry/supervisor/employment'));
        }
            
                $this->render('supervise');
        }
}