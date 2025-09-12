<?php

require_once("./matematica/Addizione.php");
require_once("./statistica/Addizione.php");

$addizione1 = new Matematica\Operazioni\Addizione();
echo $addizione1->calcola(5, 10) . PHP_EOL;

$addizione2 = new \Statistica\Operazioni\Addizione();
echo $addizione2->calcola(5, 10) . PHP_EOL;