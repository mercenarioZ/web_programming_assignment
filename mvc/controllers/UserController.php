<?php

require_once('./mvc/core/BaseController.php');
class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }
    public function index()
    {
        $title = array('title' => 'Login');
        $this->render('index');
    }

    // public function login()
    // {
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $user = $this->model('UserModel');
    //     $result = $user->login($username, $password);
    //     if ($result == 1) {
    //         $_SESSION['username'] = $username;
    //         header('Location: index.php?controller=product&action=index');
    //     } else {
    //         header('Location: index.php?controller=login&action=index');
    //     }
    // }
}