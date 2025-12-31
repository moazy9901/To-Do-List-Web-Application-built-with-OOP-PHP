<?php

require_once "../inc/connection.php";
require_once "../App.php";


if ($Request->checkPost($Request->get("id"))) {
    $title = $Request->clean($Request->get("title"));
    $validation->isvaild("title", $title, ["str", "required"]);
    $errors = $validation->getErrors();
    $id = $Request->get("id");
    //validation
    if (empty($errors)) {
        $stm = $conn->prepare("update todo set status = :title where id = :id");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        if ($stm) {
            $Session->set("success", "the task updated successfuly");
            $Request->home();
        } else {
            $Session->set("errors", ["the task updated faild"]);
            $Request->edit($id);
        }
    } else {
        $Session->set("errors", $errors);
        $Request->edit($id);
    }
} else {
    $Request->edit($id);
}
