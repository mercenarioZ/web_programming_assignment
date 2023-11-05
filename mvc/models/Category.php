<?php
class Category
{
    public $id;
    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['name']);
        }
        return $list;
    }

    public static function findById($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM categories WHERE id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();

        if (isset($item['id'])) {
            return new Category($item['id'], $item['name']);
        } else {
            return null;
        }
    }
}