<?php

class Pdf{

    public function __construct(){
        require_once('../app/tcpdf/tcpdf.php');
    }
    public function billing(TicketModel $ticket){
        $html ="<h1>Ticket </h1><br><h2>von ".$ticket->von." nach ".$ticket->nach."</h2>";
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("PHP GOD 23");
        $pdf->SetTitle('Ticket '.$ticket->von." - ".$ticket->nach);
        $pdf->SetSubject('Ticket '.$ticket->von." - ".$ticket->nach);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der MArgins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Automatisches Autobreak der Seiten
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Image Scale
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Schriftart
        $pdf->SetFont('dejavusans', '', 10);

// Neue Seite
        $pdf->AddPage();

// Fügt den HTML Code in das PDF Dokument ein
        $pdf->writeHTML($html, true, false, true, false, '');

//Ausgabe der PDF
    $pdfName ="Ticket";
//Variante 1: PDF direkt an den Benutzer senden:
        $pdf->Output($pdfName, 'I');
    }
}
