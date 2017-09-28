<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 27-09-2017 @ 11:18:44


class Votes {

    private $type, $num;

    public function __construct($type, $num) {
        $this->type = $type;
        $this->num = $num;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getNumberOfVotes(){
        return $this->num;
    }
}
