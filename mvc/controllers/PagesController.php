<?php
require_once('./mvc/core/BaseController.php');

class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }

    public function home()
    {
        $data = array(
            'food' => 'tra tac',
            'age' => 21
        );
        $this->render('home', $data);
    }

    public function error()
    {
        $this->render('error');
    }

    public function about() {
        $this->render('about');
    }
}