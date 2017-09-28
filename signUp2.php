<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 28-09-2017 @ 14:47:29

    if($_POST){
        require_once './Classes/DatabaseCon.php';
        require_once './Classes/Controller.php';
        require_once './Classes/Photo.php';
        require_once './Classes/Votes.php';

        $c = new Controller();
        
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $password;
        $c->signUp($firstname, $email, $password);
    }
  