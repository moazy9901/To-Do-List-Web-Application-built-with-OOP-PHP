<?php

namespace Classes\Validation;

require_once "ValidInterface.php";

use Classes\Validation\ValidInterface;

class Required implements ValidInterface{
    public function checkValid($key , $value){
        if(empty($value)){
            return "$key is Required";
        }
        else{
            return false;
        }
    }
}