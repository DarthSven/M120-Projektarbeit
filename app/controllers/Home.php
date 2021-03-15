<?php
    class Home extends Controller{
        protected $user;
        public function __construct(){
            $this->user = $this->model('User');
        }

        public function index($name = '') {
            $user = $this->user;
            $user->name = $name;
            $this->view('home/index', ['name' => $user->name]);
        }

        public function listParameters($var1 = '', $var2 = '', $var3 = '', $var4 = ''){
            $this->view('home/listParameters', ['vars' => $var1, $var2, $var3, $var4]);
        }
    }
