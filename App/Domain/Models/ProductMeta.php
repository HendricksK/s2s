<?php 

namespace App\Domain\Models;

class ProductMeta
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
            
            $metadata = $this->database->prepare('SELECT * FROM product_meta WHERE id = ?');
            $metadata->execute([$id]);
            $data = $metadata->fetch();

            $productMeta = (object) [
                'id'            => $data['id'],
                'type'          => $data['type'],
                'value'         => $data['value'],
                'product_id'    => $data['product_id'],
                'product_sku'    => $data['product_sku'],
            ];

            return $productMeta;
        } catch (Exception $e) {
            error_log($e);
            return null;
        }
        
    }

    public function getProductAttributesViaProdId($id) {
        try {
            $database = new Database;
            $this->database = $database->dbInit();
            
            $metadata = $this->database->prepare('SELECT * FROM product_meta WHERE product_id = ?');
            $metadata->execute([$id]);
            $productMeta = $metadata->fetchAll();
    
            return $productMeta;
        } catch (Exception $e) {
            error_log($e);
            return null;
        }

    }

    public function getAll() {
        try {
            $database = new Database;
            $this->database = $database->dbInit();
            
            $metadata = $this->database->prepare('SELECT * FROM product_meta');
            $metadata->execute();
            $data = $metadata->fetchAll();

            $productMeta = (object) [
                'product_meta' => $data,
            ];

            return $productMeta;
        } catch (Exception $e) {
            error_log($e);
            return null;
        }
        
    }
}