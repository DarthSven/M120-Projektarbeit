<?php

class Settings extends Controller{

    public function __construct()
    {
        if(!isset($_COOKIE["darkmode"])){
            $cookie_name = "darkmode";
            $cookie_value = "false";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }
        if(!isset($_COOKIE["size"])){
            $cookie_name = "size";
            $cookie_value = "medium";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }
    }

    public function index(){
        $data = $_COOKIE;
        if(isset($_GET["fontSize"])){
            $cookie_name = "size";
            $cookie_value = $_GET["fontSize"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $data["size"] = $_GET["fontSize"];
        }
        if(isset($_GET["lightmode"])){
            $cookie_name = "darkmode";
            $cookie_value = "false";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $data["darkmode"] = "false";
        }
        if(isset($_GET["darkmode"])){
            $cookie_name = "darkmode";
            $cookie_value = "true";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $data["darkmode"] = "true";
        }

        $this->view('settings/index', $data);
    }


}