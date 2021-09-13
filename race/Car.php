<?php

class Car
{
    public $straightSpeed;
    public $curveSpeed;
    public $id;
    public $trackPosition;

    function setStraightSpeed($straightSpeed)
    {
        $this->straightSpeed = $straightSpeed;
    }
    function getStraightSpeed()
    {
        return $this->straightSpeed;
    }
    function setCurveSpeed($curveSpeed)
    {
        $this->curveSpeed = $curveSpeed;
    }
    function getCurveSpeed()
    {
        return $this->curveSpeed;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setTrackPosition($trackPosition)
    {
        $this->trackPosition = $trackPosition;
    }
    function getTrackPosition()
    {
        return $this->trackPosition;
    }

    public function generateStraightSpeed()
    {
        $this->straightSpeed = rand(4, 18);
    }
    public function generateCurveSpeed()
    {
        $this->curveSpeed = 22 - $this->straightSpeed;
    }
}
