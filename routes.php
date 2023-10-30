<?php
$controllers = array(
    'pages' => ['home', 'error', 'about'],
    'login' => ['login'],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once('./mvc/controllers/' . $controller . 'Controller.php');
$klass = ucfirst($controller) . 'Controller';
$controller = new $klass;
$controller->$action();
