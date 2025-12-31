<?php

namespace Classes\Validation;

require_once "ValidInterface.php";

use Classes\Validation\ValidInterface;

class Str implements ValidInterface
{
    public function checkValid($key, $value)
    {
        if (is_numeric($value)) {
            return "$key must be string";
        } else {
            return false;
        }
    }
}
