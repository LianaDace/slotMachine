<?php

$board = [
    ["-","-","-","-","-"],
    ["-","-","-","-","-"],
    ["-","-","-","-","-"]
];


function displayBoard(array $board): void
{
    print_r(" | {$board[0][0]} | {$board[0][1]} | {$board[0][2]} | {$board[0][3]} | {$board[0][4]} | \n ");
    print_r("--------------------- \n" );
    print_r(" | {$board[1][0]} | {$board[1][1]} | {$board[1][2]} | {$board[1][3]} | {$board[1][4]} | \n ");
    print_r("--------------------- \n" );
    print_r(" | {$board[2][0]} | {$board[2][1]} | {$board[2][2]} | {$board[2][3]} | {$board[2][4]} | \n ");
}

$credits = [
    "A" => 1,
    "B" => 2,
    "C" => 3,
];

$symbols = [
    "A", "A", "A", "A", "A",
    "B", "B", "B", "B",
    "C", "C", "C"
];

$playerTotal = 100;
$perItem = 0.5;

while($playerTotal >= 0) {
    $makeBet = (readline("Make a bet: "));
    $playerTotal = $playerTotal - $makeBet;
    $koef = $makeBet / 10;

    for ($i = 0; $i < count($board); $i++) {

        for ($j = 0; $j < count($board[$i]); $j++) {
            $index = shuffle($symbols);
            $board[$i][$j] = $symbols[$index];
        }
    }

    displayBoard($board);


$winLines = [
    [$board[0][0], $board[0][1], $board[0][2], $board[0][3], $board[0][4]],
    [$board[1][0], $board[1][1], $board[1][2], $board[1][3], $board[1][4]],
    [$board[2][0], $board[2][1], $board[2][2], $board[2][3], $board[2][4]],
    [$board[0][0], $board[1][1], $board[2][2], $board[1][3], $board[0][4]],
    [$board[2][0], $board[1][1], $board[0][2], $board[1][3], $board[2][4]],
];



$prize = 0;

foreach($winLines as $lines){
    $getFirstChar = $lines[0];
    $count = 0;
    for($i = 0; $i < count($lines); $i++){

        if($getFirstChar !== $lines[$i]){
            break;
        }else{
            $count = $count + 1;
        }

    }

    if($count >= 3){
        $prize = $prize + $perItem + ($credits[$getFirstChar] * $count) + $koef;
        $playerTotal = $playerTotal + $prize;
        echo $getFirstChar . ": " . $count . PHP_EOL;
    }

}
echo "You won: " . $prize . PHP_EOL;
echo "Your total is: " . $playerTotal . PHP_EOL;
$test = readline("Would you like to continue? y/n ");
if($test === "y"){
    continue;
}
    if($test === "n"){
        echo "Thanks for playing! Your total: " . $playerTotal . PHP_EOL;
        exit;
    }
$i++;
}
