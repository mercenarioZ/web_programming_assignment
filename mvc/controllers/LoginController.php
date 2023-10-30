<?php

require_once('./mvc/core/BaseController.php');
class LoginController extends BaseController
{
    function __construct()
    {
        $this->folder = 'login';
    }
    public function login()
    {
        $this->render('login');
    }
}