<?php

$res = FALSE;

if(isset($_POST['email']) && isset($_POST['password'])){
    
    require_once dirname(__FILE__, 2) . "/Classes/Controller.php";
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $c = new Controller();
    $res = $c->signIn($email, $password);
}

if($res){
    header("Location: ../Browse.php");
    die();
}
 else {
     header("Location: ../index.php");
     die();
}