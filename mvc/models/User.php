<?php
// User model

class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;

    public function __construct($id, $username, $password, $email, $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    // For admin
    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM users');

        foreach ($req->fetchAll() as $item) {
            $list[] = new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
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

        return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
    }

    public static function findByUsername($username)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $item = $req->fetch();

        if ($item) {
            return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
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
            return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
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
                'role' => $role
            )
        );

        return $result;
    }

    // public static function saveToken($email, $token)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->prepare('UPDATE users SET token = :token WHERE email = :email');
    //     $result = $req->execute(
    //         array(
    //             'token' => $token,
    //             'email' => $email
    //         )
    //     );

    //     return $result;
    // }

    // public static function findByToken($token)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->prepare('SELECT * FROM users WHERE token = :token');
    //     $req->execute(array('token' => $token));
    //     $item = $req->fetch();

    //     if ($item) {
    //         return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
    //     } else {
    //         return null;
    //     }
    // }

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

        return $result;
    }

}