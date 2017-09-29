<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 26-09-2017 @ 14:34:27

require_once dirname(__FILE__, 2) . '/Tools/DataValidation.php';
require_once dirname(__FILE__) . '/DatabaseCon.php';
require_once dirname(__FILE__) . '/Photo.php';
require_once dirname(__FILE__) . '/Votes.php';
require_once dirname(__FILE__) . '/User.php';


class Controller {
    
    private $dbCon;
    private $CurrentUserId;

    public function __construct() {
        $this->dbCon = new DatabaseCon();
        session_start();
        $this->CurrentUserId = $this->getThisUserId();
    }
    
    public function getThisUserId(){
        if($this->isLoggedIn()){
            return $_SESSION['uid'];
        }
        return -1;
    }

        public function isLoggedIn(){
        return isset($_SESSION['uid']) ? true : false;
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
    
    private function toObject_Photo($q){
            $votes['likes'] = new Votes('Likes', $q['likes']);
            $votes['dislikes'] = new Votes('Dislikes', $q['dislikes']);
            $votes['funny'] = new Votes('Funny', $q['funnys']);
            $votes['love'] = new Votes('Love', $q['loves']);
            
            $author = new User($q['authorId'], $q['authorName']);
            
            $photo = new Photo($q['id'],
                                    $q['caption'],
                                    $q['imagedata'],
                                    $q['mimetype'],
                                    $q['story'],
                                    $q['credit'],
                                    $author,
                                    $votes); 
            
            return $photo;
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
        
        if($this->isLoggedIn()
                && DataValidation::str($caption, 64)
                && DataValidation::image($imageData)
                && DataValidation::str($mimeType, 32)
                && DataValidation::text($story, 200)
                && DataValidation::str($credit, 64)){
            
            $this->dbCon->uploadPhoto($this->CurrentUserId, $imageData, $mimeType, 
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
            
            $this->dbCon->voteLike($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function dislikePhoto($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->voteDislike($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function voteFunny($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->voteFunny($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function lovePhoto($photoId){
        if($this->isLoggedIn()
                && DataValidation::integer($photoId)){
            
            $this->dbCon->voteLove($this->CurrentUser->getId(), $photoId);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    //!!!!
    public function signIn($email, $password){
        
        try{
        $user = $this->dbCon->login($email, $password);
        if($user)
        {
        $_SESSION['uid']=$user['id']; // Storing user session value
        
        return true;
        }
        else
        {
        return false;
        } 
        }
        catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
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
    
    public function getPhotosByUser($userId, $num){
        if(!$q = $this->dbCon->getVoterPhotos($userId, $num)){
            //throw new Exception("Error - getPhotosByUser($userId, $num)");
            return FALSE;
        }
        else {
            return $this->toObjects_Photos($q);
        }
    }
    
    public function getPhoto($PhotoId){
            if(!$q = $this->dbCon->getPhoto($PhotoId)){
            //throw new Exception("Error - getPhotosByUser($userId, $num)");
            return FALSE;
        }
        else {
            return $this->toObject_Photo($q);
        }
    }
}
