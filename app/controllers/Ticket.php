<?php


class Ticket extends Controller
{
    public function index($von, $nach, $ab, $an, $erw, $kid, $dog)
    {
        require_once('../app/core/Pdf.php');
        require_once('../app/models/TicketModel.php');
        $pdf = new Pdf();

        $ppp = $an - $ab;
        $ppp = date('h.i', substr($ppp,0,-3));
        $price = (($erw * $ppp * 2) + ($kid * $ppp * 1) + ($dog * $ppp * 0.5));
        $type = $_COOKIE["type"];
        $text = "Hinfahrt";
        if ($type == 2) {
            $text = "Hin- und Rückfahrt";
            $price = $price * 2;
        }
        if ($type == 3) {
            $text = "Mehrfahrtenkarte (10 Fahren)";
            $price = $price * 10;
        }
        $ticket = new TicketModel();
        $ticket->von = $von;
        $ticket->nach = $nach;
        $ticket->abfahrt = date("d.n.y H:i", substr($ab, 0, -3));
        $ticket->ankunft = date("d.n.y H:i",  substr($an, 0, -3));
        $ticket->erwachsene = $erw;
        $ticket->kinder = $kid;
        $ticket->hunde = $dog;
        $ticket->price = $price;
        $ticket->typ = $text;
        $pdf->GenerateTicket($ticket);
        $this->view("home/index");
    }
}