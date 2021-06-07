<?php 

namespace App\Domain\Models;

class ProductMeta
{
    private $id;
    private $database;

    public function __construct() {
       
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function get($id) {
        $database = new Database;
        $this->database = $database->dbInit();
        
        $metadata = $this->database->prepare('SELECT * FROM product_meta WHERE id = ?');
        $metadata->execute([$id]);
        $data = $metadata->fetch();

        $productMeta = (object) [
            'id'            => $data['id'],
            'type'          => $data['type'],
            'value'         => $data['stock'],
            'product_id'    => $data['product_id'],
            'product_sku'    => $data['product_sku'],
        ];

        return $productMeta;
    }

    public function getProductAttributesViaProdId($id) {
        $database = new Database;
        $this->database = $database->dbInit();
        
        $metadata = $this->database->prepare('SELECT * FROM product_meta WHERE product_id = ?');
        $metadata->execute([$id]);
        $productMeta = $metadata->fetchAll();
        
        return $productMeta;
    }

    public function getAll() {
        $database = new Database;
        $this->database = $database->dbInit();
        
        $metadata = $this->database->prepare('SELECT * FROM product_meta');
        $metadata->execute();
        $data = $metadata->fetchAll();

        $productMeta = (object) [
            'product_meta' => $data,
        ];

        return $productMeta;
    }
}