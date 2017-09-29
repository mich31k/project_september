<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Peter
// Made on : 27-09-2017 @ 19:35:39


class DataValidation {

    static public function image($image){
        return TRUE;
    }
    
    static public function integer($integer){
        return TRUE;
    }
    
    static public function str($string, $maxLength = FALSE, $minLength = 1){
        return TRUE;
    }
    
    static public function text($text, $maxLength = FALSE, $minLength = 1){
        return TRUE;
    } 
    
    static public function emailAdress($email){
        return TRUE;
    }
    
}
