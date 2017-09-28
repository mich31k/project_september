<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 26-09-2017 @ 14:34:27

require_once './Tools/DataValidation.php';
require_once 'DatabaseCon.php';
require_once 'Photo.php';
require_once 'Votes.php';
require_once 'User.php';


class Controller {
    
    private $dbCon;
    private $CurrentUser;

    public function __construct() {
        $this->dbCon = new DatabaseCon();
        $this->CurrentUser = new User(1, "Ole", "Oles mail");
    }

    private function isLoggedIn(){
        if($this->CurrentUser){
            return TRUE;
        }
        return FALSE;
    }

    private function toObjects_Photos($q){
        $photos = array();
        foreach ($q as $photo){
            $votes = array();
            $votes['likes'] = new Votes('Likes', $photo['likes']);
            $votes['dislikes'] = new Votes('Dislikes', $photo['dislikes']);
            $votes['funny'] = new Votes('Funny', $photo['funnys']);
            $votes['love'] = new Votes('Love', $photo['loves']);
            
            $author = new User($photo['authorId'], $photo['authorName']);
            
            $photos[] = new Photo($photo['id'],
                                    $photo['caption'],
                                    $photo['imagedata'],
                                    $photo['mimetype'],
                                    $photo['story'],
                                    $photo['credit'],
                                    $author,
                                    $votes); 
            
            
        }
        return $photos;
    }

    public function getPhotos_random($num){
        if(!$q = $this->dbCon->getPhotos_random($num)){
            //throw new Exception("Error - getPhotos_random($num)");
            return FALSE;
        }
        
        return $this->toObjects_Photos($q);
    }
    
    public function getLikedPhotos_random($num){
        if(!$q = $this->dbCon->getLikedPhotos_random($num)){
            //throw new Exception("Error - getLikedPhotos_random($num)");
            return FALSE;
        }
        
        return $this->toObjects_Photos($q);
    }
    
    public function getDislikedPhotos_random($num){
        if(!$q = $this->dbCon->getDislikedPhotos_random($num)){
            //throw new Exception("Error - getDislikedPhotos_random($num)");
            return FALSE;
        }
        
        return $this->toObjects_Photos($q);
    }   
    
    public function getLovedPhotos_random($num){
        if(!$q = $this->dbCon->getLovedPhotos_random($num)){
            //throw new Exception("Error - getLovedPhotos_random($num)");
            return FALSE;
        }
        
        return $this->toObjects_Photos($q);
    }
    
    public function getFunnyPhotos_random($num){
        if(!$q = $this->dbCon->getFunnyPhotos_random($num)){
            //throw new Exception("Error - getFunnyPhotos_random($num)");
            return FALSE;
        }
        else {
            return $this->toObjects_Photos($q);
        }
        
        
    }
    
    public function uploadPhoto($caption, $imageData, $mimeType, $story, $credit){
        //If Loggedin
        if($this->isLoggedIn()
                && DataValidation::str($caption, 64)
                && DataValidation::image($imageData)
                && DataValidation::str($mimeType, 32)
                && DataValidation::text($story, 200)
                && DataValidation::str($credit, 64)){
            
            $this->dbCon->uploadPhoto($this->CurrentUser->getId(), $imageData, $mimeType, 
                                        $caption, $story, $credit);
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }
    
    public function likePhoto($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->createLikeVote($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function dislikePhoto($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->createDislikeVote($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function voteFunny($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->createFunnyVote($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function lovePhoto($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->createLoveVote($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    //!!!!
    public function signIn($email, $password){
        if(!$this->isLoggedIn())
        {
            $this->dbCon->login($email, $password);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    //!!!!
    public function signOut(){
        
    }

    public function signUp($firstname, $email, $password){
         if(!$this->isLoggedIn()
                && DataValidation::str($firstname, 32)
                && DataValidation::emailAdress($email)
                && DataValidation::str($password, 128)){
            
            if($this->dbCon->createUser($firstname, $email, $password)){
                $this->signIn($email, $password);
                return TRUE;
            }
        }
        return FALSE;
    }
}
