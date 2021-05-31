<?php


class Ticket extends Controller
{
    public function index($von, $nach, $ab, $an, $erw, $kid, $dog)
    {
        require_once('../app/core/Pdf.php');
        require_once('../app/models/TicketModel.php');
        $pdf = new Pdf();

        $ticket = new TicketModel();
        $ticket->von = $von;
        $ticket->nach = $nach;
        $ticket->abfahrt = $ab;
        $ticket->ankunft = $an;
        $ticket->erwachsene = $erw;
        $ticket->kinder = $kid;
        $ticket->hunde = $dog;
        $pdf->GenerateTicket($ticket);
        $this->view("home/index");
    }
}