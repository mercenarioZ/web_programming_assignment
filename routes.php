<!-- Routes -->
<?php
$controllers = array(
    'pages' => ['index', 'error'],
    'products' => ['index', 'show'],
);

// If the controller is not in the array, then it will be set to the error controller
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

// Include the controller file
include_once('controllers/' . ucfirst($controller) . 'Controller.php');

// Create a new instance of the needed controller
$klass = ucfirst($controller) . 'Controller';
$controller = new $klass;
$controller->$action();