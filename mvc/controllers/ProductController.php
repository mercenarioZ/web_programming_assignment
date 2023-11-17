<?php
// Product controller

require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/Product.php');

class ProductController extends BaseController
{
    private $categoryId = array('1', '2', '3', '4');
    private $categoryName = array('Consumer Electronics', 'Clothes', 'Shoes', 'Books');

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
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $price = isset($_POST['price']) ? $_POST['price'] : null;
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;

        // Validate input

        // Handle the image upload
        $errors = array();

        $file_name = $image['name'];
        // $file_size = $image['size'];
        $file_tmp = $image['tmp_name'];
        $file_type = $image['type'];
        $exploded = explode('.', $image['name']);
        $file_ext = strtolower(end($exploded));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
    }


    public function filter() // filter product by search bar or category
    {
        $category_id = isset($_GET['c_id']) ? $_GET['c_id'] : null;
        $search_query = isset($_GET['search']) ? $_GET['search'] : null;

        if ($category_id) {
            $products = Product::findByCategoryId($category_id);
        } elseif ($search_query) {
            $products = Product::search($search_query);
        } else {
            $products = Product::all();
        }

        $data = array(
            'products' => $products
        );
        $this->render('filter', $data);
    }

    public function create() // display create new product form
    {
        $this->render('create');
    }
}
