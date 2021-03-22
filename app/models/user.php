<?php


class user
{
    public  $id;
    public $name;
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getAge(){
        $result = $this->db->fetchSingle("SELECT age FROM user WHERE id = $this->id");
        return $result['age'];
    }

}