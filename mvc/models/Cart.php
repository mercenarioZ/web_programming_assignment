<?php
class Cart
{
    public $id;
    public $username;
    public $item_id;
    public $category_id;
    public $created_at;

    public function __construct($id, $username, $item_id, $category_id, $created_at)
    {
        $this->id = $id;
        $this->username = $username;
        $this->item_id = $item_id;
        $this->category_id = $category_id;
        $this->created_at = $created_at;
    }
    public static function userCart($username)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM products WHERE username = :username');
        $req->execute(array('username' => $username));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Cart($item['id'], $item['username'], $item['item_id'], $item['category_id'], $item['created_at']);
        }

        return $list;
    }
    public static function create($id, $username, $item_id, $category_id, $created_at)
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO carts (id, username, item_id, category_id, created_at) VALUES (:id, :username, :item_id, :category_id, :created_at)');
        $req->execute(
            array(
                'username' => $username,
                'item_id' => $item_id,
                'category_id' => $category_id,
                'created_at' => $created_at
            )
        );
    }
    public static function findByItemId($item_id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM carts WHERE item_id = :item_id');
        $req->execute(array('item_id' => $item_id));
        $item = $req->fetch();
        if ($item == null) {
            return null;
        }

        return new Cart($item['id'], $item['username'], $item['item_id'], $item['category_id'], $item['created_at']);
    }
    // Filter product by category
    public static function findByCategoryId($category_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM carts WHERE category_id = :category_id');
        $req->execute(array('category_id' => $category_id));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Cart($item['id'], $item['username'], $item['item_id'], $item['category_id'], $item['created_at']);
        }

        return $list;
    }
    public static function search($query) // Search product by name or description
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM carts WHERE name LIKE :query OR description LIKE :query');
        $req->execute(array('query' => "%$query%"));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Cart($item['id'], $item['username'], $item['item_id'], $item['category_id'], $item['created_at']);
        }

        return $list;
    }
    public static function destroy($id) // Delete item_id by id. This action will completely remove the item_id from database.
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM carts WHERE id = :id');
        $req->execute(array('id' => $id));
    }

}