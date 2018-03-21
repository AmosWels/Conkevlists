<?php

class ApiTestController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionApi()
	{
		$this->render('api');
	}
	public function actionData()
	{
		$this->render('data');
	}
}