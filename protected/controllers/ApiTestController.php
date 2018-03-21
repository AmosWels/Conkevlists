<?php
//namespace app\controllers;

class ApiTestController extends Controller
{
	public function actionIndex()
	{
            echo 'this is a test';            exit();
		$this->render('index');
	}
	public function actionApi()
	{
//            echo 'this creation controllergggggss ' ;
                $position = TPersonpositions::model()->findAll(); 
                $this->renderJSON($position);
	}
	public function actionListaLLPep()
	{
                $people = TPerson::model()->findAll(); 
                echo count($people);
                $this->renderJSON($people);
	}
	public function actionData()
	{
            echo 'You got it papapapa';            exit();
		$this->render('data');
	}
        
        protected function renderJSON($data){   
    header('Content-type: application/json');
    echo CJSON::encode($data);

    foreach (Yii::app()->log->routes as $route) {
        if($route instanceof CWebLogRoute) {
            $route->enabled = false; // disable any weblogroutes
        }
    }
    Yii::app()->end();
}
}