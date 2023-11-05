<?php

require_once './mvc/core/BaseController.php';
require_once './mvc/models/Category.php';
class CategoryController extends BaseController
{
    function __construct()
    {
        $this->folder = 'category';
    }
    public function index()
    {
        $categories = Category::all();
        $data = array('categories' => $categories);
        $this->render('index', $data);
    }

    public function show()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $category = Category::findById($id);
        if (!$category) {
            header('Location: index.php?controller=category');
        }

        $data = array('category' => $category);
        $this->render('show', $data);
    }

    public function store()
    {
        echo __METHOD__;
    }
}