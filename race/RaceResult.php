<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];
    private $raceResults =[];

    public function getRoundResults()
    {
        // TODO write functionality to display if overall winner is tied with another car
        // If there are cars that tied, print that there was a tie and which cars tied
        // Else print the overall winner
        $roundResults = $this->roundResults;
        $raceResults = $this->raceResults;
        $round = 1;
        $counter = 0;
        echo "\r\n\r\nRace Results\r\n";

        foreach($raceResults as $key => $val){
            echo "Round $round - Car $roundResults[$counter] - Track $val\r\n";
            $round += 1;
            $counter += 1;
        }
        $raceWinner = $this->displayWinner($roundResults, count($roundResults));
        echo "\r\nThe winner of the race is Car $raceWinner!\r\n";
    }
    public function setCarPositions($raceResults) : array
    {
        return $this->raceResults = $raceResults;
    }
    public function getCarPositions()
    {
        return $this->raceResults;
    }
    public function setRoundResults($roundResults): array
    {
        return $this->roundResults = $roundResults;
    }
    public function displayWinner($arr, $rounds)
    {
        sort($arr);
        sort($arr, $rounds);

        $max_count = 1;
        $res = $arr[0];
        $curr_count = 1;

        for ($i = 1; $i < $rounds; $i++) {
            if ($arr[$i] == $arr[$i - 1])
                $curr_count++;
            else {
                if ($curr_count > $max_count) {
                    $max_count = $curr_count;
                    $res = $arr[$i - 1];
                }
                $curr_count = 1;
            }
        }
        if ($curr_count > $max_count) {
            $max_count = $curr_count;
            $res = $arr[$rounds - 1];
        }
        return $res;
    }
}
