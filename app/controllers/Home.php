<?php

class home extends Controller
{

    public function index($name = '')
    {
        $this->view('home/index', ['name' => $name]);
    }
}

?>