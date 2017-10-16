<?php


class MainView{

	public static function generatePage($data):string{
		return "<p>{$data['text']}</p>";
	}

}