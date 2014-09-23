<?php 
require_once('Neighborhood.php');
require_once('Constitution.php');
require_once('GameOfLife.php');

$population = [
    '4,2',
    '2,3',
    '3,3',
    '3,4',
    '4,4'
];

$matrixSize = 5;

$neighborhood = new Neighborhood($population, $matrixSize);

$constitution = new Constitution($neighborhood);

$game = new GameOfLife($constitution, $neighborhood);

var_dump($game->nextGeneration());

$population = [
    '2,3',
    '2,4',
    '3,2',
    '3,4',
    '4,4'
];

$matrixSize = 5;

$neighborhood = new Neighborhood($population, $matrixSize);

$constitution = new Constitution($neighborhood);

$game = new GameOfLife($constitution, $neighborhood);

var_dump($game->nextGeneration());
