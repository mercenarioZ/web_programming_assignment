<?php

require_once 'connection.php';

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    echo $controller . '<br>';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        echo $action;
    } else {
        $action = 'index';
    }
} else {
    $controller = 'home';
    $action = 'index';
}

