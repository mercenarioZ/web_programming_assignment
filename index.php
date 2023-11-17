<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/css/style.css">

<?php
require_once('connection.php');

if (isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'page';
    $action = 'index';
}

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

$http_host = trim($_SERVER['HTTP_HOST']);

$dir = str_replace('\\', '/', __DIR__);
$folder = trim(str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower($dir)));

if (substr($folder, 0, 1) == '/') {
    $folder = substr($folder, 1);
}

// echo $folder . '<br>';
// echo __DIR__ . '<br>';

if (substr($http_host, -1) != '/') {
    $http_host .= '/';
}

$web_root = $protocol . $http_host . $folder;

define('WEB_ROOT', $web_root); // Define a global variable for root path

define('APP_NAME', 'Sheepo'); // Define a global variable for application name

// echo WEB_ROOT . '/index.php';

require_once('routes.php');
?>

