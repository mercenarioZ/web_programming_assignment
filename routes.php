<?php
$controllers = array(
    'page' => ['index', 'error', 'about', 'profile', 'changeUserInfo'],
    'user' => ['login', 'register', 'logout', 'forgotPassword', 'resetPassword'],
    'product' => ['index', 'show', 'store', 'filter', 'create'],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'page';
    $action = 'error';
}

include_once('./mvc/controllers/' . $controller . 'Controller.php');
$klass = ucfirst($controller) . 'Controller';
$controller = new $klass;
$controller->$action();
