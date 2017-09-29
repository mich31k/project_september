<?php

$res = FALSE;

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    
    require_once dirname(__FILE__, 2) . "/Classes/Controller.php";
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $c = new Controller();
    $res = $c->signUp($username, $email, $password);
}

if($res){
    header("Location: ../Browse.php");
    die();
}
 else {
     header("Location: ../index.php");
     die();
}



