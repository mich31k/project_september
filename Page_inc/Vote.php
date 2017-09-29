<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 29-09-2017 @ 11:06:28


$types = array("funny", "like", "dislike", "love");

if(isset($_POST['photoId']) 
        && isset($_POST['voteType']) 
        && array_search($_POST['voteType'], $types)){
    
    $photoid = $_POST['photoId'];
    $type = $_POST['voteType'];
    
    require_once dirname(__FILE__, 2) . "/Classes/Controller.php";
    $c = new Controller();
    
    if($c->isLoggedIn()){
        
        if($type == "funny"){
            $c->voteFunny($photoId);
        }
        elseif ($type == "dislike") {
            $c->dislikePhoto($photoId);
        }
        elseif ($type == "love") {
            $c->lovePhoto($photoId);
        }
        else{
            $c->likePhoto($photoId);
        }
    }
}

$previous = "";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

header("location: $previous");
