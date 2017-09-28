<?php
session_start();

include("inc/dbconfig.php");
include('inc/userClass.php');
$userClass = new userClass();

$errorMsgReg='';

if (!empty($_POST['registerSubmit'])){
    $username=$_POST['usernameReg'];
    $email=$_POST['emailReg'];
    $password=$_POST['passwordReg'];
    //$name=$_POST['nameReg'];
    var_dump($username);
    var_dump($email);
    var_dump($password);
    if($username && $email && $password){
        $uid=$userClass->userRegistration($username,$password,$email);
        var_dump($uid);
        if($uid){
            $url=BASE_URL.'home.php';
            header("Location: $url"); // Page redirecting to home.php 
        }else{
        $errorMsgReg="Username or Email already exists.";
        }
    }
}
?>
