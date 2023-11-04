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

$dir = str_replace('\\', '/', __DIR__);
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower($dir));

$web_root = $protocol . $_SERVER['HTTP_HOST'] . $folder;

define('WEB_ROOT', $web_root); // Define a global variable for root path

require_once('routes.php');