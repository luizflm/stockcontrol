<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProductHandler;



class ProductController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function add() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('add', [
            'loggedUser' => $this->loggedUser,
            'flash' => $flash
        ]);
    }

    public function addAction() {
        $product = [];

        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $company = filter_input(INPUT_POST, 'company');
        $stock = filter_input(INPUT_POST, 'stock');
        $max_stock = filter_input(INPUT_POST, 'max_stock');
        $min_stock = filter_input(INPUT_POST, 'min_stock');

        $name = ucfirst($name);
        $company = ucfirst($company);

        if($name && $price && $company && $stock && $max_stock && $min_stock) {
            if(ProductHandler::findByName($name) === false) {

                $product['name'] = $name;
                $product['price'] = $price;
                $product['company'] = $company;
                $product['stock'] = $stock;
                $product['max_stock'] = $max_stock;
                $product['min_stock'] = $min_stock;

                ProductHandler::addProduct($product);

                $this->redirect('/');

            } else {
                $_SESSION['flash'] = 'The product already exists';
                $this->redirect('/add');
            }


        } else {
            $_SESSION['flash'] = 'Fill in all fields';
            $this->redirect('/add');
        }

    }

    public function editItem($atts) {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $item = ProductHandler::findById($atts['id']);

        if($item) {
            $this->render('item_config', [
                'item' => $item,
                'flash' => $flash
            ]);

        } else {
            $this->redirect('/');
        }
    }

    public function editItemAction($atts) {
        $editedItem = [];

        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $company = filter_input(INPUT_POST, 'company');
        $stock = filter_input(INPUT_POST, 'stock');
        $max_stock = filter_input(INPUT_POST, 'max_stock');
        $min_stock = filter_input(INPUT_POST, 'min_stock');

        $name = ucfirst($name);
        $company = ucfirst($company);
    
        if($name && $price && $company && $stock && $max_stock && $min_stock) {
            $editedItem['id'] = $id;
            $editedItem['name'] = $name;
            $editedItem['price'] = $price;
            $editedItem['company'] = $company;
            $editedItem['stock'] = $stock;
            $editedItem['max_stock'] = $max_stock;
            $editedItem['min_stock'] = $min_stock;

            $inEditProduct = ProductHandler::findByName($name);

            if($inEditProduct === false) {
                ProductHandler::updateProduct($editedItem);
                
            } else {
                if($name === $inEditProduct->name) {
                    ProductHandler::updateProduct($editedItem);
                    
                } else { 
                    $_SESSION['flash'] = 'The product name already exists';
                    $this->redirect('/edit_item/'.$id);
                }    
            }

            $this->redirect('/');
        } else {
            $_SESSION['flash'] = 'Fill in all fields';
            $this->redirect('/edit_item/'.$id);
        }
    }

    public function delete($atts) {
        $item = ProductHandler::findById($atts['id']);

        if($item) {
            ProductHandler::deleteProduct($item->id);
        } 

        $this->redirect('/');
    }
}