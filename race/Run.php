<?php
include_once('Race.php');

// Run a race and print the results
$test = new Race();
$results = $test->runRace();
print_r($results->getRoundResults());
