<?php

class Pdf
{

    public function __construct()
    {
        require_once('../app/tcpdf/tcpdf.php');
    }

    public function GenerateTicket(TicketModel $ticket)
    {
        $html = "<h1>Ihr ganz Persönliches Ticket steht zum Druck bereit!</h1><br><h2>von " . $ticket->von . " nach " . $ticket->nach . "</h2><br><h2>Ihre Verbindung</h2><br><h4>Abfahrt: $ticket->abfahrt</h4><br><h4>Ankunft: $ticket->ankunft</h4>
<br><br><h2>Folgende Tickets wurden gekauft:</h2><br><h4>Erwachsene: $ticket->erwachsene<br>Kinder: $ticket->kinder<br>Hunde: $ticket->hunde</h4>
<br>Gesammtpreis: $ticket->price CHF<br><h3>Ihr Tickettyp: $ticket->typ</h3><br><br><br><p>Vielen Dank, dass sie sich für die SBB entschieden haben. </p>
<p>Geniessen Sie eine Schmerzlose Fahrt in den neuen Massageabteilen. Tickets nicht erhätlich. </p>
<p>Wenn Sie fragen zu useren Dienstlsietungen haben, wenden Sie sich an das Fachpersonal unter <a href='mailto:spam@sbb.ch'>spam@sbb.ch</a>. Wir werden ihr Anliegen schnellstmöglich ignorieren. 
Wir freuen uns, Sie bald wieder auf diesem Ticketautomaten begrüssen können zu dürfen. </p>
<br><br><br><p>* für die Bezahlung dieses Tickets, lassen Sie sich von einer Fachperson beraten, wenden Sie sich an den nächsten Ticketautomat und werfen Sie den entsprechenden Betrag ein. </p>";
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("PHP GOD 23");
        $pdf->SetTitle('Ticket ' . $ticket->von . " - " . $ticket->nach);
        $pdf->SetSubject('Ticket ' . $ticket->von . " - " . $ticket->nach);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der Margins
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
        $pdfName = "Ticket";
//Variante 1: PDF direkt an den Benutzer senden:
        $pdf->Output($pdfName, 'I');
    }
}
