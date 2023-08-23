<?php
include 'db.php';
require 'Database.php';
class User{
    public $nombre;
    public $username;
    public $password;


    public function userExists($email, $pass){
        $md5pass = md5($pass);
        $config = require('includes-login/config.php');
        $db = new Database($config['database']);
        $query = 'SELECT * FROM usuarios WHERE email = :email AND password = :pass';
        $user = $db->query($query, ['email' => $email, 'pass' => $md5pass])->fetch();

        if($user){
            $_SESSION['user']=$user;

            return true;
        }else{
            return false;
        }
    }


}


?>