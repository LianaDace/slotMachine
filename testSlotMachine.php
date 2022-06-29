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


$minBet = 10;
$perItem = 0.5;
$makeBet = (readline("Make a bet: "));
$koef = $makeBet / 10;
//$isInt = preg_match('|^[0-9]+$|', $makeBet);

//if($makeBet != $isInt){
//    echo "You can input only numbers. Please, make a bet: ";
//}



$symbols = [
    "A", "A", "A", "A", "A",
    "B", "B", "B", "B",
    "C", "C", "C"
];

$i = 0;

while($i < 1) {

    for ($i = 0; $i < count($board); $i++) {

        for ($j = 0; $j < count($board[$i]); $j++) {
            $index = shuffle($symbols);
            $board[$i][$j] = $symbols[$index];
        }
    }

    displayBoard($board);

    $i++;
}

$winLines = [
    [$board[0][0], $board[0][1], $board[0][2], $board[0][3], $board[0][4]],
    [$board[1][0], $board[1][1], $board[1][2], $board[1][3], $board[1][4]],
    [$board[2][0], $board[2][1], $board[2][2], $board[2][3], $board[2][4]],
    [$board[0][0], $board[1][1], $board[2][2], $board[1][3], $board[0][4]],
    [$board[2][0], $board[1][1], $board[0][2], $board[1][3], $board[2][4]],
];

$credits = [
    "A" => 1,
    "B" => 2,
    "C" => 3,
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
        echo $getFirstChar . ": " . $count . PHP_EOL;
    }

}
echo "You won: " . $prize . PHP_EOL;

////AAA = 3 AAAA = 4 AAAAA = 5
//BBB = 4.5 BBBB = 6 BBBBB = 7.5
//CCC = 6 CCCC = 8 CCCCC = 10

