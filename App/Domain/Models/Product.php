<?php 

namespace App\Domain\Models;

use App\Domain\Models\ProductMeta;
use App\Domain\Models\Database;

class Product
{
    private $id;
    private $database;

    public function __construct() {}

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function get($id) {
        try {
            $database = new Database;
            $this->database = $database->dbInit();
            
            $productdata = $this->database->prepare('SELECT * FROM product WHERE id = ?');
            $productdata->execute([$id]);
            $data = $productdata->fetch();

            $productMeta = new ProductMeta();
            $attributes = $productMeta->getProductMetaViaProdId($id);

            $product = (object) [
                'id'            => $data['id'],
                'sku'           => $data['sku'],
                'stock'         => $data['stock'],
                'meta'          => $attributes,
            ];

            return $product;
        } catch (\PDOException $e) {
            error_log($e);
            return $e->getMessage();
        }
        
    }

    public function getAll() {
        try {
            $database = new Database;
            $this->database = $database->dbInit();
            
            $productdata = $this->database->prepare('SELECT * FROM product');
            $productdata->execute();
            $data = $productdata->fetchAll();
            
            $productMeta = new ProductMeta();

            for($x = 0; $x < sizeof($data); $x++) {
                $attributes = $productMeta->getProductMetaViaProdId($data[$x]['id']);
                if (!empty($attributes)) {
                    $data[$x]['meta'] = $attributes;    
                }
            }

            $product = (object) [
                'products' => $data,
            ];

            return $product;

        } catch (\PDOException $e) {
            error_log($e);
            return $e->getMessage();
        }
    }

    public function create(array $product) {
        try {
            $database = new Database;
            $this->database = $database->dbInit();
            
            $productdata = $this->database->prepare('INSERT INTO product (sku, stock) VALUES (?, ?)');
            $productdata->execute([
                $product['sku'], 
                $product['stock']
            ]);
            
            $id = $this->database->lastInsertId();
            $newproduct = $this->get($id);
            $metacreations = [];

            if (!empty($product['meta'])) {
                $productMeta = new ProductMeta();
                foreach ($product['meta'] as $meta) {
                    $metacreations[] = $productMeta->create($meta);
                }
            }

            $newproduct->meta = $metacreations;

            return $product;

        } catch (\PDOException $e) {
            error_log($e);
            return $e->getMessage();
        }
    }
}