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

        $this->view('settings/index', null);
    }
}