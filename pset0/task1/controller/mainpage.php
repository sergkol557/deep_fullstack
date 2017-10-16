<?php

require_once ROOT.'/model/mainmodel.php';
require_once ROOT.'/view/mainview.php';

class ControllerMainPage
{

	public function actionIndex(){
		$data = MainModel::getData();
		$data = MainView::generatePage($data);
		 require_once ROOT.'/template/maket.html';
		 return true;
	}
}