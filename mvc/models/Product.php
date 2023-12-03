<?php
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

    public static function findById($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if ($item == null) {
            return null;
        }

        return new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
    }

    public static function findProductsByIds($ids)
    {
        $list = [];
        $db = DB::getInstance();
        $idsString = implode(',', $ids);
        $req = $db->query("SELECT * FROM products WHERE id IN ($idsString)");

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }

    // Filter product by category
    public static function findByCategoryId($category_id)
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
    public static function findByCategoryIdList($category_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE category_id = :category_id AND seller = :seller');
        $req->execute(array('category_id' => $category_id, 'seller' => $_SESSION['user']['id']));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }
    public static function findByUserId($seller)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE seller = :seller');
        $req->execute(array('seller' => $seller));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }

    public static function search($query) // Search product by name or description
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE name LIKE :query OR description LIKE :query');
        $req->execute(array('query' => "%$query%"));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], $item['category_id'], $item['created_at'], $item['seller'], $item['active']);
        }

        return $list;
    }

    public static function destroy($id) // Delete product by id. This action will completely remove the product from database.
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM products WHERE id = :id');
        $req->execute(array('id' => $id));
    }

    public static function create($name, $description, $price, $image, $category_id, $seller)
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO products (name, description, price, image, category_id, seller) VALUES (:name, :description, :price, :image, :category_id, :seller)');
        $req->execute(
            array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category_id,
                'seller' => $seller
            )
        );
    }

    public static function update($id, $name, $description, $price, $image, $category_id, $seller, $active) // Update product by id.
    {
        $db = DB::getInstance();
        $req = $db->prepare('UPDATE products SET name = :name, description = :description, price = :price, image = :image, category_id = :category_id, seller = :seller, active = :active WHERE id = :id');
        $req->execute(
            array(
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category_id,
                'seller' => $seller,
                'active' => $active
            )
        );
    }
}