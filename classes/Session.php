<?php

namespace Classes\Session;

class Session{
 public function __construct(){
    session_start();
 }

 public function set($key , $value){
    $_SESSION[$key] = $value;
 }
 public function get($key){
    return isset($_SESSION[$key])?$_SESSION[$key]:"not found";
 }
 public function check($key){
    return isset($_SESSION[$key])?true:false;
 }

 public function remove($key){
    unset($_SESSION[$key]);
 }
 public function clear(){
    session_destroy();
 }
}