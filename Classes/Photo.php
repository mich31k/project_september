<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 27-09-2017 @ 11:10:50

require_once 'Votes.php';

class Photo {

    public $id, $caption, $imageData, $mimeType, 
            $story, $credit, $author, $votes;


    public function __construct($id, $caption, $imageData, $mimeType, $story, $credit, $author, $votes) {
        $this->id = $id;
        $this->caption = $caption;
        $this->imageData = $imageData;
        $this->mimetype = $mimeType;
        $this->story = $story;
        $this->credit = $credit;
        $this->author = $author;
        $this->votes = $votes;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getCaption(){
        return $this->caption;
    }
    
    public function getImagedata(){
        return $this->imageData;
    }
    
    public function getMimeType(){
        return $this->mimetype;
    }
    
    public function getStory(){
        return $this->story;
    }
    
    public function getCredit(){
        return $this->credit;
    }
    
    public function getAuthor(){
        return $this->author;
    }

    public function getLikes(){
        return $this->votes['like']->getNumberOfVotes();
    }
    
    public function getLoves(){
        return $this->votes['love']->getNumberOfVotes();
    } 
    
    public function getDislikes(){
        return $this->votes['dislike']->getNumberOfVotes();
    }
    
    public function getFunnys(){
        return $this->votes['funny']->getNumberOfVotes();
    }
    
    public function getAllVotes(){
        return $this->votes;
    }
}
