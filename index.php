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
require_once('routes.php');