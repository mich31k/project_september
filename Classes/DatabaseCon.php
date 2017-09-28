<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 26-09-2017 @ 13:13:02

require_once './Tools/DbP.php';
require_once './Tools/DbH.php';


class DatabaseCon {

    private $db;
    public $log;

    public function __construct() {
        $this->db = DbH::getDbH();
        $this->log = array();
    }

    public function getPhotos_random($num){
        try {
            $q = $this->db->prepare("CALL getPhotos_Random(:num)");
            $q->bindValue(':num', $num);
            $q->execute();
            return $q->fetchAll();
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
    
    private function getPhotosByType_random($type, $num){
        try {
            $q = $this->db->prepare("CALL getPhotosByType_Random(:type, :num)");
            $q->bindValue(':type', $type);
            $q->bindValue(':num', $num);
            $q->execute();
            return $q->fetchAll();
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
    
    public function getLovedPhotos_random($num){
        return $this->getPhotosByType_random('love', $num);
    }  
    
    public function getLikedPhotos_random($num){
        return $this->getPhotosByType_random('like', $num);
    }
    
    public function getDislikedPhotos_random($num){
        return $this->getPhotosByType_random('dislike', $num);
    }
    
    public function getFunnyPhotos_random($num){
        return $this->getPhotosByType_random('funny', $num);
    }
    
    public function createUser($firstname, $email, $password){
        try {
            
            $q = $this->db->prepare("CALL createVoter(:firstname, :email, :password)");
            $q->bindValue(':firstname', $firstname);
            $q->bindValue(':email', $email);
            $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $q->execute();
            
            return TRUE;
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
    
    //!!!
    public function uploadPhoto($userId, $imagedata, $mimetype, $caption, $story, $credit){
        try {
            
            $q = $this->db->prepare("CALL uploadPhoto("
                                            . ":imagedata, "
                                            . ":caption, "
                                            . ":mimetype, "
                                            . ":story, "
                                            . ":credit, "
                                            . ":userid)");
            $q->bindValue(':imagedata', $imagedata);
            $q->bindValue(':caption', $caption);
            $q->bindValue(':mimetype', $mimetype);
            $q->bindValue(':story', $story);
            $q->bindValue(':credit', $credit);
            $q->bindValue(':userid', $userId);
            $q->execute();
            
            return TRUE;
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
    
    public function getPhoto($photoId){
        try {
            $q = $this->db->prepare("CALL getPhoto(:id)");
            $q->bindValue(':id', $photoId);
            $q->execute();
            return $q->fetch();
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
    
    private function createVote($userId, $photoId, $voteType){
        try {
            
            $q = $this->db->prepare("CALL createVote(:userId, :photoId, :voteType)");
            $q->bindValue(':userId', $userId);
            $q->bindValue(':photoId', $photoId);
            $q->bindValue(':voteType', $voteType);
            $q->execute();
            
            return TRUE;
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }

    public function createLikeVote($userId, $photoId){
        return $this->createVote($userId, $photoId, 'like');
    }
    
    public function createDislikeVote($userId, $photoId){
        return $this->createVote($userId, $photoId, 'dislike');
    }
    
    public function createLoveVote($userId, $photoId){
        return $this->createVote($userId, $photoId, 'love');
    }
    
    public function createFunnyVote($userId, $photoId){
        return $this->createVote($userId, $photoId, 'funny');
    }
    
    public function login($email, $password){
        try {
            $q = $this->db->prepare("CALL login(:email, :password)");
            $q->bindValue(':email', $email);
            $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $q->execute();
            
            return $q->fetch();
        } 
        catch(PDOException $e) {
            $this->log[] = $e->getMessage();
             return FALSE;
        }
    }
}
