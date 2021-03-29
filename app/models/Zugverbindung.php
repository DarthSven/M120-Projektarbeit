<?php


class Zugverbindung
{
    public $Abfahrtsort;
    public $Ankunftsort;
    public $Abfahrtszeit;

    public function __construct($from, $to, $date)
    {
        $this->Abfahrtsort = $from;
        $this->Ankunftsort = $to;
        $this->Abfahrtszeit = $date;
    }
}