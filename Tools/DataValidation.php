<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 27-09-2017 @ 19:35:39


class DataValidation {

    static public function image($image){
        return TRUE;
    }
    
    static public function integer($integer){
        return TRUE;
    }
    
    static public function str($string, $maxlength = FALSE){
        return TRUE;
    }
    
    static public function text($text, $maxlength = FALSE){
        return TRUE;
    } 
    
    static public function emailAdress($email){
        return TRUE;
    }
    
}
