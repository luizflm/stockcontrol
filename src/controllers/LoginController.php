<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin() {
        $flash = '';

        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password) {

            $token = LoginHandler::verifyLogin($email, $password);

            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'Incorrect email or password.';
                $this->redirect('/login');
            }

        } else {
            $_SESSION['flash'] = 'Fill in all fields.';
            $this->redirect('/login');
        }
    }
 
    public function signup() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('signup', [
            'flash' => $flash
        ]);
    }

    public function signUpAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $name = filter_input(INPUT_POST, 'name');
        $password = filter_input(INPUT_POST, 'password');
        // Não pode existir email igual ao preenchido
        // Não esquecer de transformar a senha em hash;

        if($email && $name && $password) {

            if(LoginHandler::emailExists($email) === false) {
                $token = LoginHandler::addUser($email, $name, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'E-mail already in use';
                $this->redirect('/signup');
            }

        } else {
            
            $_SESSION['flash'] = 'Fill in all fields';
            $this->redirect('/signup');
        }
    }

    public function logout() {
        $_SESSION['token'] = '';

        $this->redirect('/');
    }
    
}