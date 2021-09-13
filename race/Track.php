<?php

class Track
{
    public $track;

    public function createTrack()
    {
        $counter = 1;
        $tracks = [];
        $trackType = array(1 => "straight", 2 => "curved");

        for ($x = 1; $x <= 10; $x++) {
            $pickTrack = array_rand($trackType);
            for ($y = 1; $y <= 40; $y++) {
                $tracks[$counter] = $pickTrack;
                $counter += 1;
            }
        }
        return $tracks;
    }
}
