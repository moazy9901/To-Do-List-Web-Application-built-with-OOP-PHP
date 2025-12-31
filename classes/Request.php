<?php

namespace Classes\Request;

class Request{
    public function get($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    public function post($key)
    {
        return $_POST[$key];
    }
    public function checkPost($key)
    {
        return isset($key) ? true : false;
    }
    public function clean($key)
    {
        return trim(htmlspecialchars($key));
    }
    public function home()
    {
        header("location:../");
    }
    public function edit($id)
    {
        header("location:../edit.php?id=$id");
    }
    public function server($key)
    {
        return isset($_SERVER[$key]) ? $_SERVER[$key] : null;
    }




}