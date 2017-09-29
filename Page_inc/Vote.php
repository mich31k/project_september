<?php

if(isset($_GET['fotoid']) 
        && isset($_GET['votetype'])){
    
    $photoId = $_GET['fotoid'];
    $type = $_GET['votetype'];
    
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
