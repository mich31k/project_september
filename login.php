<?php
session_start();
include("inc/dbconfig.php");
include('inc/userClass.php');
$userClass = new userClass();

$errorMsgLogin='';

if (!empty($_POST['loginSubmit'])){
    $usernameEmail=$_POST['usernameemailLog'];
    $password=$_POST['passwordLog'];
    if($usernameEmail && $password){
        $uid=$userClass->userLogin($usernameEmail,$password);
        if($uid){
            $url=BASE_URL.'home.php';
            header("Location: $url"); // Page redirecting to home.php 
        }else{
            $errorMsgLogin="Please check login details.";
        }
    }
}
?>
