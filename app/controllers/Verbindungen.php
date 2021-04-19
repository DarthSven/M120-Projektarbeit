<?php


class Verbindungen extends Controller
{
    public function index($von, $nach, $time)
    {
        $this->view('verbindungen/index', ['von' => $von, 'nach' => $nach,'time' => $time]);
    }
}