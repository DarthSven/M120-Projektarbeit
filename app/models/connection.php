<?php


class connection
{
    public $departureTime;
    public $arrivalTime;
    public $departureTrack;
    public $departureStation;
    public $arrivalStation;
    public $price;

    public function getLength(){
        return $this->departureTime - $this->arrivalTime;
    }
}