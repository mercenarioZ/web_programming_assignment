<?php
require_once('./mvc/core/BaseController.php');

class PageController extends BaseController
{
    function __construct()
    {
        $this->folder = 'page';
    }

    public function index()
    {
        $this->render('index');
    }

    public function error()
    {
        $this->render('error');
    }

    public function about()
    {
        $this->render('about');
    }
}