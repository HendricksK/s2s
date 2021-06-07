<?php 

namespace App\Domain\Models;

use \App\Domain\Models\ProductMeta;
use \App\Domain\Models\Database;

class Product
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
        
        $productdata = $this->database->prepare('SELECT * FROM product WHERE id = ?');
        $productdata->execute([$id]);
        $data = $productdata->fetch();

        $productMeta = new ProductMeta();
        $attributes = $productMeta->getProductAttributesViaProdId($id);

        $product = (object) [
            'id'            => $data['id'],
            'sku'           => $data['sku'],
            'stock'         => $data['stock'],
            'attributes'    => $attributes,
        ];

        return $product;
    }

    public function getAll() {
        $database = new Database;
        $this->database = $database->dbInit();
        
        $productdata = $this->database->prepare('SELECT * FROM product');
        $productdata->execute();
        $data = $productdata->fetchAll();
        
        $productMeta = new ProductMeta();

        for($x = 0; $x < sizeof($data); $x++) {
            $attributes = $productMeta->getProductAttributesViaProdId($data[$x]['id']);
            if (!empty($attributes)) {
                $data[$x]['attributes'] = $attributes;    
            }
        }

        $product = (object) [
            'products' => $data,
        ];

        return $product;
    }
}