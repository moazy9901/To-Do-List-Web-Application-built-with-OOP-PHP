<?php
namespace Classes\Validation;

require_once "Required.php";
require_once "Str.php";
class Validation{
    private $errors = [];
public function isvaild($key , $value , $rules){

    foreach ($rules as $rule){
        $rule = "Classes\Validation\\" . ucfirst($rule);
        $object = new $rule();
        $error = $object->checkValid($key, $value);
        if($error != false){
            $this->errors[] = $error;
        }
    }
    
}
public function getErrors(){
    return $this->errors;
}
}