<?php

// Product model

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $category_id;
    public $created_at;
    public $seller;
    public $active;

    public function __construct($id, $name, $description, $price, $image, $category_id, $created_at, $seller, $active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = number_format($price);
        $this->image = $image;
        $this->category_id = $category_id;
        $this->created_at = $created_at;
        $this->seller = $seller;
        $this->active = $active !== "false";
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM products ORDER BY created_at DESC');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }

    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();

        return new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
    }

    public static function findByCategory($category_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE category_id = :category_id');
        $req->execute(array('category_id' => $category_id));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }

    public static function findByName($name)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE name = :name');
        $req->execute(array('name' => $name));
        $item = $req->fetch();

        return new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
    }
    public static function findByDescription($description)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE description = :description');
        $req->execute(array('description' => $description));
        $item = $req->fetch();

        return new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
    }

    public static function destroy($id) // Delete product by id. This action will completely remove the product from database.
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM products WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}