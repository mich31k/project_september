<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author : Lene Tramm
// Made on : 28-09-2017 @ 09:02:32


class Authentication {

    private static function setTestCookie() {
        setcookie('foo', 'bar', time() + 3600);
    }
    
    public static function areCookiesEnabled() {
        self::setTestCookie();
        return (isset($_COOKIE['foo']) && $_COOKIE['foo'] == 'bar') ? true : false;
  }
  
    public static function Signout() {
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);
  }
  
    public static function isAuthenticated() {
        return isset($_SESSION[self::SESSVAR]) ? true : false;
    }
}
