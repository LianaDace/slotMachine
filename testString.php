<?php

//Pārbauda 1 līniju (string)

$bet = 20;
$koef = $bet / 10;
$def = 0.5;

$input = "AAAAA";
$getFirstChar = substr($input, 0, 1);
echo $getFirstChar;
$check = str_split($input);
$countMatching = 0;
var_dump($check);

for($i = 0; $i < strlen($input); $i++){
    if($getFirstChar != $input[$i]){
        break;
    }else {
        $countMatching = $i + 1;
    }
}
var_dump($getFirstChar);
var_dump($countMatching);



$prize = [
    "A" => 2,
    "B" => 3,
];

$winningSymb = $prize[$getFirstChar] * $countMatching;

$prize = $def * $winningSymb * $koef;

var_dump($winningSymb);
