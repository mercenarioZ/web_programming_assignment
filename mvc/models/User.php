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

    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE id = :id'); // Use prepared statement (:id and execute() method) to prevent SQL injection. Read more: https://www.w3schools.com/sql/sql_injection.asp
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

        return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
    }

    public static function findByEmail($email)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        $item = $req->fetch();

        return new User($item['id'], $item['username'], $item['password'], $item['email'], $item['role']);
    }

    public static function create($username, $password, $email, $role) // Create new user, role = 0: user, role = 1: admin
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)');
        $req->execute(
            array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'role' => $role
            )
        );
    }
}