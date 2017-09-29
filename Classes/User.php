<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 27-09-2017 @ 11:08:16


class User {

    private $id;
    private $firstname;
    private $email;

    public function __construct($id, $firstname, $email = 'Unknown') {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->email = $email;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getFirstname(){
        return $this->firstname;
    }
    
    public function getEmail(){
        return $this->email;
    }
}
