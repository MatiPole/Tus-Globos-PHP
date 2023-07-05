<?php

include_once 'includes-login/user.php';
include_once 'includes-login/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user']) && $_SESSION['user']['nivel'] == 1){
    //echo "Hay sesión";
        include_once 'home.php';
    if  (isset($_SESSION['user']) && $_SESSION['user']['nivel'] == 2) {
        // nivel de usuario igual a 2, redirigir a traerusuarios.php
        include_once 'traerusuarios.php';
    }
}else if(isset($_POST['email']) && isset($_POST['password'])){
    //echo "Validación de login";

    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        if ($_SESSION['user']['nivel'] == 2) {
        // nivel de usuario igual a 2, redirigir a traerusuarios.php
        include_once 'traerusuarios.php';
    } else {
        // otro nivel de usuario, redirigir a home.php
        include_once 'home.php';
    }
    }else{
        //echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once 'login.php';
    }

}else{
    //echo "Login";
    include_once 'login.php';
}

?>