<?php

require_once('./mvc/core/BaseController.php');
class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }
    public function login()
    {
        $data = array('title' => 'Login');
        $this->render('login', $data);
    }
    public function register()
    {
        $data = array('title' => 'Register');
        $this->render('register', $data);
    }
}