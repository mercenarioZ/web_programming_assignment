<?php

require_once('controllers/BaseController.php');
require_once('models/Product.php');

class ProductsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'products';
    }

    public function index() {
        // $products = Product::getAll();
        // $data = array('products' => $products);
        // $this->render('index', $data);

        echo __METHOD__;
    }

    public function show()
    {
        // echo __METHOD__;
        $this->render('show');
    }
}
