<?php
// Product controller

require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/Product.php');

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'product';
    }
    public function index() // get all products
    {
        $products = Product::all();
        $data = array('products' => $products);
        $this->render('index', $data);
    }

    public function show() // show detail product by id
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $product = Product::findById($id);
            $data = array(
                'product' => $product
            );
            if ($product == null) {
                header('Location: index.php?controller=product');
            }
            $this->render('show', $data);
        } else {
            header('Location: index.php?controller=product');
        }
    }

    public function store() // create new product
    {
        echo __METHOD__;
    }

    public function filter() // filter product by category_id
    {
        $category_id = isset($_GET['c_id']) ? $_GET['c_id'] : null;
        $products = Product::findByCategoryId($category_id);
        $data = array(
            'products' => $products
        );
        $this->render('index', $data);
    }
}
