<?php

//Pārbauda 1 līniju (string)

$bet = 20;
$koef = $bet / 10;
$def = 0.5;

$input = "BBBBB";
$getFirstChar = substr($input, 0, 1);
$check = str_split($input);
$countMatching = 0;


for($i = 0; $i < strlen($input); $i++){
    if($getFirstChar != $input[$i]){
        break;
    }else {
        $countMatching = $i + 1;
    }
}

$prize = [
    "A" => 2,
    "B" => 3,
];

$winningSymb = $prize[$getFirstChar] * $countMatching;

$prize = $def * $winningSymb * $koef;

echo "You got " . "$countMatching" . " " . $getFirstChar . ". You got " . $prize . " coins!" . PHP_EOL;
