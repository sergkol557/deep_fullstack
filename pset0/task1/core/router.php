<?php


class Router
{
	private $routes;
	private $controller_name;
	private $action_name;

	public static function getControlAct(){
		$path = urldecode(parse_url( $_SERVER['REQUEST_URI'],PHP_URL_PATH));
		$path = trim($path, '/');
		$path = explode('/', $path);

		if (!isset($path[0]) || empty($path[0])){
			$path[0] = 'main';
		}
		if (!isset($path[1]) || empty($path[1])){
			$path[1] = 'index';
		}
		return [$path[0], $path[1]];
	}

	public function __construct(){
		$this->routes = include ROOT.'/config/routes.php';
		list($controller, $action) = Router::getControlAct();

		if (!isset($this->routes[$controller][$action])){
			logError("request page {$_SERVER['REQUEST_URI']} not found");
			Router::ErrorPage404();
		}

		$this->controller_name = $controller.'page';
		$this->action_name = 'action'.$action;
	}

	public function start(){
		$controller_file_name = ROOT."/controller/{$this->controller_name}.php";

		if (!file_exists($controller_file_name)){
			logError("controller file $controller_file_name not exists");
			Router::ErrorPage404();
			die();
		}

		require_once $controller_file_name;

		$this->controller_name = 'Controller'.$this->controller_name;

		if (!class_exists($this->controller_name)){
			logError("class {$this->controller_name} not exists");
			Router::ErrorPage404();
			die();
		}

		$pageController = new $this->controller_name;

		if (!method_exists($this->controller_name,$this->action_name )){
			logError("action {$this->controller_name}->{$this->action_name} not exists");
			Router::ErrorPage404();
			die();
		}

		if(call_user_func([$pageController, $this->action_name])){
			logError('user get page'.urldecode($_SERVER['REQUEST_URI']));
		}

	}

	public static function ErrorPage404()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
	}
}
