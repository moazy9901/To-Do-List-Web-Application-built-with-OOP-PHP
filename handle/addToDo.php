<?php

require_once "../inc/connection.php";
require_once "../App.php";


if($Request->checkPost($Request->post("submit"))){
$title = $Request->clean($Request->post("title"));
$validation->isvaild("title", $title, ["str", "required"]);
$errors = $validation->getErrors();
//validation
if(empty($errors)){   
    $stm = $conn->prepare("insert into todo(`title`) values(:title)");
    $stm->bindParam(":title", $title, PDO::PARAM_STR);
    $stm->execute();
    if($stm){
        $Session->set("success" , "the task inserted successfuly");
        $Request->home();
    } else {
            $Session->set("errors", ["the task inserted faild"]);
            $Request->home();
        }
}
else{
    $Session->set("errors",$errors);
        $Request->home();
} 
}else{
    $Request->home();
}