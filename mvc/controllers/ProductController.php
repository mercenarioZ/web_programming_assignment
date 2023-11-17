<?php
// Product controller

require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/Product.php');

class ProductController extends BaseController
{
    // private $categoryId = array('1', '2', '3', '4');
    // private $categoryName = array('Consumer Electronics', 'Clothes', 'Shoes', 'Books');

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
        $category_id = isset($_POST['category']) ? $_POST['category'] : null;

        // Error handling
        $errors = array();

        // Validate input
        if (!$name) {
            $errors['name'] = 'Name is required!';
        }

        if (!$description) {
            $errors['description'] = 'Description is required!';
        }

        if (!$price) {
            $errors['price'] = 'Price is required!';
        }

        if (!$image || $image['size'] == 0) {
            $errors['image'] = 'Image is required!';
        }

        if ($category_id === 'none' || !$category_id) {
            $errors['category'] = 'Category is required!';
        }

        // Handle the image upload
        $file_name = $image['name'];
        $file_tmp = $image['tmp_name']; // temporary path of image (it will be deleted after upload)
        $exploded = explode('.', $image['name']); // explode image name by dot
        $file_ext = strtolower(end($exploded)); // get the last element of exploded array (file extension)

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors['extensions'] = "File extension is not allowed, please choose a JPEG/JPG or PNG file.";
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
            $imagePath = "assets/uploads/" . $file_name;

            // Store product to database
            Product::create($name, $description, $price, $imagePath, $category_id);

            header('Location: index.php?controller=product'); // redirect to product list page after creating new product
        } else {
            $this->render('create', array('errors' => $errors));
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
