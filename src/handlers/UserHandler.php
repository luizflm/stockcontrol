<?php
namespace src\handlers;

use \src\models\User;

class UserHandler {

    public static function findById($id) {
        $data = User::select()->where('id', $id)->one();

        if($data) {
            $user = new User();
            $user->id = $data['id'];
            $user->email = $data['email'];
            $user->name = $data['name'];

            return $user;
        } else {
            return false;
        }
    }

    public static function emailExists($email) {
        $user = User::select()->where('email', $email)->one();

        return $user? true : false;
    }

    public static function updateUser($user) {
            if(!empty($user['password'])) {
                $hash = password_hash($user['password'], PASSWORD_DEFAULT);

                User::update()
                ->set([
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'password' => $hash
                ])
                ->where('id', $user['id'])
            ->execute();
            } else {
                User::update()
                ->set([
                    'email' => $user['email'],
                    'name' => $user['name']
                ])
                ->where('id', $user['id'])
            ->execute();
            }
      
        
    }


}