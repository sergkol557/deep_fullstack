<?php

require_once ROOT.'/core/model.php';

class MainModel implements Model {

	public static function getData(){
		$result = file_get_contents(ROOT.'/data/maindata.json');
		$result = json_decode($result,true);
		return $result;
	}

}