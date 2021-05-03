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

        $changed = FALSE;
        if(isset($_POST["fontSize"])){
            $cookie_name = "size";
            $cookie_value = $_POST["fontSize"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            $changed = TRUE;
        }
        if(isset($_POST["lightmode"])){
            $cookie_name = "darkmode";
            $cookie_value = "false";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            $changed = TRUE;
        }
        if(isset($_POST["darkmode"])){
            $cookie_name = "darkmode";
            $cookie_value = "true";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            $changed = TRUE;
        }
        if($changed){
            header("Refresh:0, url=Settings");
        }


        $this->view('settings/index');
    }


}