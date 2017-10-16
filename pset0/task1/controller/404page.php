<?php

require_once ROOT.'/model/404model.php';
require_once ROOT.'/view/404view.php';

class Controller404Page{
	public function actionIndex(){
		$data = Model404::getData();
		$data = View404::generatePage($data);

		require_once ROOT.'/template/maket.html';
		return true;
	}

}