<?php


class Ticket extends Controller
{
    public function index(){
        require_once('../app/core/Pdf.php');
       $pdf = new Pdf();
        $pdf->billing();
        $this->view("home/index");
   }
}