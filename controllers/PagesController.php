<?php

require_once 'controllers/BaseController.php';
class PagesController extends BaseController
{
    /**
     * Summary of __construct
     */
    function __construct()
    {
        $this->folder = 'pages';
    }

    /**
     * Summary of home
     * @return void
     */
    public function index()
    {
        // $data = array(
        //     'name' => 'John',
        //     'age' => 25
        // );
        // $this->render('home', $data);

        echo __METHOD__;
    }

    /**
     * Summary of error
     * @return void
     */
    public function error()
    {
        $this->render('error');
    }
}