<?php
include_once('Track.php');
include_once('Car.php');
include_once('RoundResult.php');
include_once('RaceResult.php');

class Race
{
    public $track;
    public $car1;
    public $car2;
    public $car3;
    public $car4;
    public $car5;
    public $roundResults;
    public $raceResults;
    public $blankTrack;

    public function runRace(): RaceResult
    {
        $blankTrack = new Track();
        $car1 = new Car();
        $car1->setId(1);
        $car1->generateStraightSpeed();
        $car1->generateCurveSpeed();
        $car1->setTrackPosition(0);
        $car2 = new Car();
        $car2->setId(2);
        $car2->generateStraightSpeed();
        $car2->generateCurveSpeed();
        $car2->setTrackPosition(0);
        $car3 = new Car();
        $car3->setId(3);
        $car3->generateStraightSpeed();
        $car3->generateCurveSpeed();
        $car3->setTrackPosition(0);
        $car4 = new Car();
        $car4->setId(4);
        $car4->generateStraightSpeed();
        $car4->generateCurveSpeed();
        $car4->setTrackPosition(0);
        $car5 = new Car();
        $car5->setId(5);
        $car5->generateStraightSpeed();
        $car5->generateCurveSpeed();
        $car5->setTrackPosition(0);
        $cars = [$car1, $car2, $car3, $car4, $car5];
        $roundResults = [];
        $track = $blankTrack->createTrack();
        $raceResults = new RaceResult();
        $carPositions = [];


        for ($x = 1; $x < 11; $x++) {
            echo "\r\n\r\nRound ";
            print_r($x);
            echo "\r\n";
            // TODO implement functionality for determining moves at the end of each series of 40 tracks
            // Get current track type and next track type, compare
            // If the same, continue remaining moves
            // If different, continue only until next series of 40 start point

            foreach ($cars as $car) {
                $trackPosition = $car->getTrackPosition();
                if ($track[$trackPosition] == 1) {
                    $newTrackPosition = $car->getStraightSpeed() + $trackPosition;
                    $roundResults[$car->getId()] = [$newTrackPosition];
                    $car->setTrackPosition($newTrackPosition);
                    $carPositions[$car->getId()] = $newTrackPosition;
                    echo "Car ";
                    print_r($car->getId());
                    echo "  -  Track ";
                    print_r($car->getTrackPosition());
                    echo "\r\n";
                } else {
                    $newTrackPosition = $car->getCurveSpeed() + $trackPosition;
                    $roundResults[$car->getId()] = $newTrackPosition;
                    $car->setTrackPosition($newTrackPosition);
                    $carPositions[$car->getId()] = $newTrackPosition;
                    echo "Car ";
                    print_r($car->getId());
                    echo "  -  Track ";
                    print_r($car->getTrackPosition());
                    echo "\r\n";
                }
            }

            $winner = max($roundResults);
            $key = array_search($winner, $roundResults);
            $winnersArray[] = $key;
            $winningCarPosition = $carPositions[$key];
            $newArray[] = array_fill_keys($winnersArray, $winningCarPosition);
            // TODO implement check for if it's a draw each round
            // Compare highest score to other scores and check if any duplicates
            // If there are duplicates of the highest score, return a draw and which cars tied
            // Else print that the car won the round
            echo "Car ";
            print_r($key);
            echo " won the round! \r\n";
            $sortArray = array_map('end', $newArray);
        }
        $raceResults->setRoundResults($winnersArray);
        $raceResults->setCarPositions($sortArray);
        return $raceResults;
    }
}
