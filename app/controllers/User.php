<?php

class User extends Controller
{

    public function show($name)
    {
        $this->view('user/show', ['name' => $name]);
    }
}

?>