<?php
// FRONT CONTROLLER

 //Общие вывод ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();


define('ROOT', dirname(__FILE__));

// Avtoload
require_once(ROOT.'/components/Autoload.php');

// Вызов Router
$router = new Router();
$router->run();

