<?php


class View404{
	public static function generatePage($data){

		$response = "<div class='news__title'>$data</div>";
		return $response;
	}
}