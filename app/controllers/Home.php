<?php

class Home extends Controller
{

    public function index($id = 1)
    {
        $user = $this->model('user');
        $user->id = $id;

        $age = $user->getAge();

        $this->view('home/index', ['name' => $age]);
    }
}

?>