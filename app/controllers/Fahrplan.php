<?php


class Fahrplan extends Controller
{

    public function index()
    {
        $this->view('fahrplan/index', []);
    }
}