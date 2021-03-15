<?php


class User extends Controller
{
    public function show(){
        $this->view('user/show', null);
    }
}