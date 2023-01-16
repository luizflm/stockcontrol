<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\UserHandler;


class UserController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index($atts) {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $user = UserHandler::findById($atts['id']);

        if($user) {
            $this->render('user_config', [
                'user' => $user,
                'flash' => $flash
            ]);
        } else {
            $this->redirect('/');
        }
     
    }

    public function editUser() {
        $editedUser = [];

        $id = filter_input(INPUT_POST, 'id');
        $email = filter_input(INPUT_POST, 'email');
        $name = filter_input(INPUT_POST, 'name');
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'password_confirm');

        if(!empty($password)) {
            if($password === $passwordConfirm) {
                $editedUser['password'] = $password;
            } else {
                $_SESSION['flash'] = 'Password do not match';
                $this->redirect('/edit_user/'.$this->loggedUser->id);
            }
        }
      

        if($email && $name) {
            $editedUser['id'] = $id;
            $editedUser['name'] = $name;
            $editedUser['email'] = $email;

            if(UserHandler::emailExists($email) === false) { 
                UserHandler::updateUser($editedUser);

            } else { 
                $inEditUser = UserHandler::findById($id);

                if($email === $inEditUser->email) {
                    UserHandler::updateUser($editedUser);

                } else {
                    $_SESSION['flash'] = 'Email already in use';
                    $this->redirect('/edit_user/'.$this->loggedUser->id);
                }
            }

            $this->redirect('/');
        } else {
            $_SESSION['flash'] = 'Fill in all fields';
            $this->redirect('/edit_user/'.$this->loggedUser->id);
        }
    }
}