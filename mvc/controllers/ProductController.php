<?php
require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/Product.php');
require_once('./mvc/models/User.php');
class ProductController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'product';
    }

    // Get all products
    public function index()
    {
        if (isset($_GET['c_id'])) {
            $category_id = $_GET['c_id'];
            $products = Product::findByCategoryId($category_id);
        } else {
            $products = Product::all();
        }
        $data = array('products' => $products);
        $this->render('index', $data);
    }

    public function list()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        if (isset($_GET['c_id'])) {
            $category_id = $_GET['c_id'];
            $products = Product::findByCategoryIdList($category_id);
        } else {
            $products = Product::findByUserId($_SESSION['user']['id']);
        }
        $data = array('products' => $products);
        $this->render('list', $data);
    }

    public function cart()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        if (isset($_GET['c_id'])) {
            $category_id = $_GET['c_id'];
            $products = Product::findByCategoryIdList($category_id);
        } else {
            $products = Product::findProductsByIds($_SESSION['user']['productsInCart']);
        }
        $ids = [];
        foreach ($products as $product) {
            $ids[] = $product->id;
        }
        // echo implode(',', $ids);
        User::updateCartUser($_SESSION['user']['email'], $ids);
        $user = User::findByEmail($_SESSION['user']['email']);
        $_SESSION['user'] = array(
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
            'amountItems' => count(json_decode($user->productsInCart, true)),
            'productsInCart' => json_decode($user->productsInCart, true)
        );
        $data = array('products' => $products);
        $this->render('cart', $data);
    }

    public function checkout()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        $data = array('products' => '');
        $this->render('checkout', $data);
    }

    // Show detail product by id
    public function show()
    {
        // session_start();

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

    // create new product
    public function store()
    {
        session_start();
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $price = isset($_POST['price']) ? $_POST['price'] : null;
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;
        $category_id = isset($_POST['category']) ? $_POST['category'] : null;
        if (empty($_SESSION['user']['username'])) {
            header('Location: index.php?controller=user&action=login');
        }
        // $seller = $_SESSION['user']['id'];
        $seller = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
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

        if (!$seller) {
            $errors['seller'] = 'Seller is required!';
        }

        // Handle the image upload
        $file_name = $image['name'];

        // Temporary path of image (it will be deleted after upload)
        $file_tmp = $image['tmp_name'];

        // Explode image name by dot
        $exploded = explode('.', $image['name']);

        // Get the last element of exploded array (file extension)
        $file_ext = strtolower(end($exploded));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors['extensions'] = "File extension is not allowed, please choose a JPEG/JPG or PNG file.";
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
            $imagePath = "assets/uploads/" . $file_name;

            // Store product to database
            Product::create($name, $description, $price, $imagePath, $category_id, $seller);

            // Redirect to product list page after creating new product
            header('Location: index.php?controller=product');
        } else {
            $this->render('create', array('errors' => $errors));
        }
    }

    // Filter product by search bar or category
    public function filter()
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
        $this->render('index', $data);
    }

    // Display create new product form
    public function create()
    {
        $this->render('create');
    }

    public function cancelSale()
    {
        session_start();
        $product = Product::findById($_GET['id']);
        if ($_SESSION['user']['id'] === $product->seller) {
            Product::destroy($_GET['id']);
            header('Location: index.php?controller=product');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }
}
?>