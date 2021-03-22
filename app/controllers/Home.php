<?php

class Home extends Controller
{

    public function index($name = '')
    {
        $user = $this->model('user');
        $user->id = 1;

        $age = $user->getAge();

        $this->view('home/index', ['name' => $age]);
    }
}

?>