<?php

require_once "../inc/connection.php";
require_once "../App.php";


if ($Request->checkPost($Request->get("id"))) {
    $id = $Request->get("id");
        $stm = $conn->prepare("delete from todo where id = :id");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        if ($stm) {
            $Session->set("success", "the task deleted successfuly");
            $Request->home();
        } else {
            $Session->set("errors", ["the task deleted faild"]);
            $Request->home();
        }
    } else {
        $Session->set("errors", $errors);
        $Request->home();
    }
