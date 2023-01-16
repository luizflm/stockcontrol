<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProductHandler;



class HomeController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $products = ProductHandler::getProducts();

        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'products' => $products
        ]);
    }
}