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
    public function index()
    {
        $products = Product::all();
        $data = array('products' => $products);
        $this->render('index', $data);
    }

    public function show()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $product = Product::find($id);
            $data = array(
                'product' => $product
            );
            $this->render('show', $data);
        } else {
            header('Location: index.php?controller=product&action=index');
        }
    }
}
