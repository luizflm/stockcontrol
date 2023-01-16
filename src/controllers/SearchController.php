<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProductHandler;


class SearchController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $search = filter_input(INPUT_GET, 'search');

        if(!empty($search)) {
            $products = ProductHandler::searchProducts($search);
        } else {
            $this->redirect('/');
        }

        $this->render('search', [
            'loggedUser' => $this->loggedUser,
            'products' => $products
        ]);
    }
}