<?php
// User model

class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;
    public $productsInCart;

    public function __construct($id, $username, $password, $email, $role, $productsInCart)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->productsInCart = $productsInCart;
    }

    // For admin
    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM users');

        foreach ($req->fetchAll() as $item) {
            $list[] = new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role'], $item['productsInCart']);
        }

        return $list;
    }

    // Find user by id
    public static function find($id)
    {
        $db = DB::getInstance();

        // Use prepared statement (:id and execute() method) to prevent SQL injection. Read more: https://www.w3schools.com/sql/sql_injection.asp
        $req = $db->prepare('SELECT * FROM users WHERE id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();

        return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role'], $item['productsInCart']);
    }

    public static function findByUsername($username)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $item = $req->fetch();

        if ($item) {
            return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role'], $item['productsInCart']);
        } else {
            return null;
        }
    }

    public static function findByEmail($email)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        $item = $req->fetch();

        if ($item) {
            return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role'], $item['productsInCart']);
        } else {
            return null;
        }
    }

    public static function register($username, $password, $email, $role) // Create new user, role = 0: user, role = 1: admin
    {
        // Get database instance
        $db = DB::getInstance();

        // Hash password before storing it in database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)');
        $result = $req->execute(
            array(
                'username' => $username,
                'password' => $hashedPassword,
                'email' => $email,
                'role' => $role,
            )
        );
        // Return values to controller
        if ($result) {
            // Get the last inserted ID
            $lastId = $db->lastInsertId();

            // Query the database for the user data
            $req = $db->prepare('SELECT * FROM users WHERE id = :id');
            $req->execute(array('id' => $lastId));
            $user = $req->fetch();

            if ($user) {
                return new User($user['id'], $user['username'], $user['password'], $user['email'], $user['role'], $user['productsInCart']);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function updateUserInfo($email, $username, $password)
    {
        $db = DB::getInstance();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $req = $db->prepare('UPDATE users SET username = :username, password = :password WHERE email = :email');
        $result = $req->execute(
            array(
                'username' => $username,
                'password' => $hashedPassword,
                'email' => $email
            )
        );
        header('Location: index.php?controller=page');
        return $result;
    }
    public static function addToCartUser($email, $idProduct)
    {
        $db = DB::getInstance();
        $user = User::findByEmail($email);
        $productsInCart = json_decode($user->productsInCart, true);
        if (!is_array($productsInCart)) {
            $productsInCart = [];
        }
        $productsInCart[] = $idProduct;
        $req = $db->prepare('UPDATE users SET productsInCart = :productsInCart WHERE email = :email');
        $result = $req->execute(
            array(
                'productsInCart' => json_encode($productsInCart),
                'email' => $email
            )
        );
        return $result;
    }
    public static function removeFromCartUser($email, $idProduct)
    {
        $db = DB::getInstance();
        $user = User::findByEmail($email);
        $productsInCart = json_decode($user->productsInCart, true);
        if (!is_array($productsInCart)) {
            $productsInCart = [];
        }
        $index = array_search($idProduct, $productsInCart);
        if ($index !== false) {
            unset($productsInCart[$index]);
        }
        $req = $db->prepare('UPDATE users SET productsInCart = :productsInCart WHERE email = :email');
        $result = $req->execute(
            array(
                'productsInCart' => json_encode($productsInCart),
                'email' => $email
            )
        );
        return $result;
    }

    public static function updateCartUser($email, $ids)
    {
        $db = DB::getInstance();
        $user = User::findByEmail($email);
        $productsInCart = json_decode($user->productsInCart, true);
        if (!is_array($productsInCart)) {
            $productsInCart = [];
        }
        $req = $db->prepare('UPDATE users SET productsInCart = :productsInCart WHERE email = :email');
        $result = $req->execute(
            array(
                'productsInCart' => json_encode($ids),
                'email' => $email
            )
        );
        return $result;

    }
}