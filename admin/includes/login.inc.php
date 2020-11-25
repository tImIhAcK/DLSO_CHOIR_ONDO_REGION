<?php

ob_start();
session_start();

require '../../classes/controller.class.php';

if (isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(Controller::query('SELECT username FROM _admin WHERE username=:username', array(':username'=>$username))){
        $hashedPwd = Controller::query('SELECT password FROM _admin WHERE username=:username', array(':username'=>$username))[0]['password'];
		if (password_verify($password, $hashedPwd)) {
            $_SESSION['email']=$email;
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>201));
        }
    }else{
        echo json_encode(array("statusCode"=>201));
    }

}