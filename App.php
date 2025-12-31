<?php


require_once "classes/Request.php";
require_once "classes/Session.php";
require_once "classes/validation/Validation.php";

use Classes\Request\Request;
use Classes\Session\Session;
use Classes\Validation\Validation;


$Request = new Request();
$Session = new Session();
$validation = new Validation();
