<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
define('IMG_DIRECTORY', 'template/images');

require_once ROOT . '/core/router.php';
require_once ROOT . '/core/logger.php';


$router = new Router();
$router->start();
