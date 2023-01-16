<?php
namespace src\handlers;

use \src\models\Product;


class ProductHandler {

    public static function getProducts() {
        $products = Product::select()->get();

        return $products;
    }

    public static function findByName($name) {
        $data  = Product::select()->where('name', $name)->one();

        if($data) {
            $product = new Product();
            $product->id = $data['id'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->company = $data['company'];
            $product->stock = $data['stock'];
            $product->max_stock = $data['max_stock'];
            $product->min_stock = $data['min_stock'];

            return $product;
        } else {
            return false;
        }

    }

    public static function findById($id) {
        $data = Product::select()->where('id', $id)->one();
        
        if($data) {
            $product = new Product();
            $product->id = $data['id'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->company = $data['company'];
            $product->stock = $data['stock'];
            $product->max_stock = $data['max_stock'];
            $product->min_stock = $data['min_stock'];

            return $product;
        } else {
            return false;
        }

        
    }

    public static function addProduct($product) {
        Product::insert([
            'name' => $product['name'],
            'price' => $product['price'],
            'company' => $product['company'],
            'stock' => $product['stock'],
            'max_stock' => $product['max_stock'],
            'min_stock' => $product['min_stock']
        ])->execute();
    }

    public static function updateProduct($product) {
        Product::update()
            ->set([
                'name' => $product['name'],
                'price' => $product['price'],
                'company' => $product['company'],
                'stock' => $product['stock'],
                'max_stock' => $product['max_stock'],
                'min_stock' => $product['min_stock']
            ])
            ->where('id', $product['id'])
        ->execute();
    }

    public static function searchProducts($search) {
        $products = [];

        $data = Product::select()->where('id', 'like', '%'.$search.'%')->get();
        
        if(empty($data)) {
            $data = Product::select()->where('name', 'like', '%'.$search.'%')->get();
            
            if(empty($data)) {
                $data = Product::select()->where('company', 'like', '%'.$search.'%')->get();
            }
        }

        if($data) {
            foreach($data as $product) {

                $newProduct = new Product();
                $newProduct->name = $product['name'];
                $newProduct->price = $product['price'];
                $newProduct->company = $product['company'];
                $newProduct->stock = $product['stock'];
                $newProduct->max_stock = $product['max_stock'];
                $newProduct->min_stock = $product['min_stock'];

                $products[] = $newProduct;
 
            }
        }

        return $products;
    }

    public static function deleteProduct($id) {
        Product::delete()->where('id', $id)->execute();
    }
 
 
}