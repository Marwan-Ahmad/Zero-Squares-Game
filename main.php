<?php


require_once 'ClassState.php';
require_once 'GamePlayer.php';
$a = [
    ['.', 'X', 'X', 'X', 'X', '.', '.', '.'],
    ['X', 'X', 'Y', '.', 'X', 'X', 'X', '.'],
    ['X', '.', '.', '.', 'X', 'GY', 'X', '.'],
    ['X', '.', '.', '.', '.', '.', 'X', 'X'],
    ['X', '.', '.', '.', '.', '.', 'GR', 'X'],
    ['X', '.', '.', 'X', '.', '.', 'X', 'X'],
    ['X', 'R', '.', 'X', 'X', 'X', 'X', '.'],
    ['X', 'X', 'X', 'X', '.', '.', '.', '.']
];
$b = [
    ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],
    ['X', '.', '.', '.', 'X', '.', 'GB', '.', '.', '.', '.', 'X'],
    ['X', '.', '.', 'X', '.', '.', '.', 'X', '.', 'X', '.', 'X'],
    ['X', '.', '.', '.', '.', '.', 'GY', 'X', '.', '.', '.', 'X'],
    ['X', '.', '.', 'X', 'X', 'X', '.', 'X', 'X', '.', '.', 'X'],
    ['X', '.', 'X', '.', '.', '.', '.', '.', '.', '.', 'GR', 'X'],
    ['X', '.', '.', 'Y', '.', '.', '.', '.', '.', '.', '.', 'X'],
    ['X', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', 'X'],
    ['X', '.', 'X', '.', 'X', '.', 'X', 'X', 'X', 'X', 'X', 'X'],
    ['X', '.', '.', 'B', '.', '.', 'X', '.', '.', '.', '.', '.'],
    ['X', '.', '.', '.', 'R', '.', 'X', '.', '.', '.', '.', '.'],
    ['X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.', '.', '.'],
];
$c = [
    ['.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.'],
    ['.', 'X', 'X', '.', '.', '.', '.', '.', 'X', 'X', 'X', '.'],
    ['X', 'X', '.', '.', 'X', '.', 'GB', '.', '.', '.', 'X', 'X'],
    ['X', '.', '.', 'X', '.', '.', '.', 'X', '.', '.', '.', 'X'],
    ['X', '.', '.', '.', '.', '.', '.', 'X', 'X', '.', '.', 'X'],
    ['X', '.', '.', '.', '.', 'GR', '.', '.', 'X', '.', '.', 'X'],
    ['X', '.', '.', '.', '.', 'X', '.', '.', 'X', 'X', '.', 'X'],
    ['X', 'R', 'X', '.', 'X', 'X', '.', '.', '.', 'X', 'B', 'X'],
    ['X', '.', '.', '.', 'X', '.', '.', '.', '.', '.', '.', 'X'],
    ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

];

$d = [
    ['.', '.', 'X', 'X', 'X', 'X', 'X', '.', '.', '.', '.', '.'],
    ['X', 'X', 'X', 'B', 'R', 'Y', 'X', '.', '.', '.', '.', '.'],
    ['X', '.', 'X', '.', '.', 'GB', 'X', 'X', 'X', 'X', 'X', '.'],
    ['X', '.', 'X', '.', '.', '.', '.', 'X', 'GR', '.', 'X', '.'],
    ['X', '.', 'X', 'X', '.', 'X', 'X', 'X', '.', '.', 'X', '.'],
    ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', 'X', '.'],
    ['X', '.', '.', 'X', 'GY', '.', '.', '.', 'X', 'X', '.', '.'],
    ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.'],
];

$e = [



    ['.', '.', '.', '.', '.', '.', '.', '.', 'X', 'X', 'X', 'X'],
    ['X ', 'X', 'X', 'X', 'X', '.', '.', 'X', 'X', '.', 'GC', 'X'],
    ['X', 'W', 'GB', 'GY', 'X', 'X', 'X', 'X', '.', '.', '.', 'X'],
    ['X', '.', '.', '.', 'B', 'C', 'Y', 'R', '.', '.', '.', 'X'],
    ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

];
$f = [

    ['.', '.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.'],
    ['.', '.', '.', '.', 'X', 'X', '.', 'R', '.', 'X', 'X', 'X'],
    ['X', 'X', 'X', 'X', 'X', '.', '.', '.', 'Y', '.', '.', 'X'],
    ['X', 'C', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
    ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
    ['X', 'B', 'GB', 'X', '.', 'W', 'X', 'X', 'X', 'X', '.', 'X'],
    ['X', 'X', 'X', 'X', '.', 'GY', '.', 'X', 'X', 'X', '.', 'X'],
    ['.', '.', '.', 'X', '.', 'GR', '.', 'X', 'X', 'X', '.', 'X'],
    ['.', '.', '.', 'X', '.', '.', '.', '.', '.', '.', '.', 'X'],
    ['.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

];
echo "    1\n";
foreach ($a as $rowa) {
    echo implode(' ', $rowa) . PHP_EOL;
}
echo PHP_EOL;
echo "2\n";
foreach ($b as $rowb) {
    echo implode(' ', $rowb) . PHP_EOL;
}
echo PHP_EOL;
echo "3\n";
foreach ($c as $rowc) {
    echo implode(' ', $rowc) . PHP_EOL;
}
echo PHP_EOL;
echo "4\n";
foreach ($d as $rowd) {
    echo implode(' ', $rowd) . PHP_EOL;
}
echo PHP_EOL;
echo "5\n";
foreach ($e as $rowe) {
    echo implode(' ', $rowe) . PHP_EOL;
}
echo PHP_EOL;
echo "6\n";
foreach ($f as $rowf) {
    echo implode(' ', $rowf) . PHP_EOL;
}
echo PHP_EOL;

$choose = readline("Choose The Board You prefer To Play (1/2/3/4/5/6): ");

switch ($choose) {
    case '1':

        $a = [
            ['.', 'X', 'X', 'X', 'X', '.', '.', '.'],
            ['X', 'X', 'Y', '.', 'X', 'X', 'X', '.'],
            ['X', '.', '.', '.', 'X', 'GY', 'X', '.'],
            ['X', '.', '.', '.', '.', '.', 'X', 'X'],
            ['X', '.', '.', '.', '.', '.', 'GR', 'X'],
            ['X', '.', '.', 'X', '.', '.', 'X', 'X'],
            ['X', 'R', '.', 'X', 'X', 'X', 'X', '.'],
            ['X', 'X', 'X', 'X', '.', '.', '.', '.']
        ];

        $game = new state(8, 8, $a);
        break;
    case '3':

        $b = [
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],
            ['X', '.', '.', '.', 'X', '.', 'GB', '.', '.', '.', '.', 'X'],
            ['X', '.', '.', 'X', '.', '.', '.', 'X', '.', 'X', '.', 'X'],
            ['X', '.', '.', '.', '.', '.', 'GY', 'X', '.', '.', '.', 'X'],
            ['X', '.', '.', 'X', 'X', 'X', '.', 'X', 'X', '.', '.', 'X'],
            ['X', '.', 'X', '.', '.', '.', '.', '.', '.', '.', 'GR', 'X'],
            ['X', '.', '.', 'Y', '.', '.', '.', '.', '.', '.', '.', 'X'],
            ['X', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', 'X'],
            ['X', '.', 'X', '.', 'X', '.', 'X', 'X', 'X', 'X', 'X', 'X'],
            ['X', '.', '.', 'B', '.', '.', 'X', '.', '.', '.', '.', '.'],
            ['X', '.', '.', '.', 'R', '.', 'X', '.', '.', '.', '.', '.'],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.', '.', '.'],
        ];

        $game = new state(12, 12, $b);
        break;
    case '2':
        $c = [
            ['.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.'],
            ['.', 'X', 'X', '.', '.', '.', '.', '.', 'X', 'X', 'X', '.'],
            ['X', 'X', '.', '.', 'X', '.', 'GB', '.', '.', '.', 'X', 'X'],
            ['X', '.', '.', 'X', '.', '.', '.', 'X', '.', '.', '.', 'X'],
            ['X', '.', '.', '.', '.', '.', '.', 'X', 'X', '.', '.', 'X'],
            ['X', '.', '.', '.', '.', 'GR', '.', '.', 'X', '.', '.', 'X'],
            ['X', '.', '.', '.', '.', 'X', '.', '.', 'X', 'X', '.', 'X'],
            ['X', 'R', 'X', '.', 'X', 'X', '.', '.', '.', 'X', 'B', 'X'],
            ['X', '.', '.', '.', 'X', '.', '.', '.', '.', '.', '.', 'X'],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

        ];
        $game = new state(10, 12, $c);
        break;
    case '4':
        $d = [
            ['.', '.', 'X', 'X', 'X', 'X', 'X', '.', '.', '.', '.', '.'],
            ['X', 'X', 'X', 'B', 'R', 'Y', 'X', '.', '.', '.', '.', '.'],
            ['X', '.', 'X', '.', '.', 'GB', 'X', 'X', 'X', 'X', 'X', '.'],
            ['X', '.', 'X', '.', '.', '.', '.', 'X', 'GR', '.', 'X', '.'],
            ['X', '.', 'X', 'X', '.', 'X', 'X', 'X', '.', '.', 'X', '.'],
            ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', 'X', '.'],
            ['X', '.', '.', 'X', 'GY', '.', '.', '.', 'X', 'X', '.', '.'],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.'],
        ];
        $game = new state(8, 12, $d);
        break;
    case '5':
        $d = [



            ['.', '.', '.', '.', '.', '.', '.', '.', 'X', 'X', 'X', 'X'],
            ['X ', 'X', 'X', 'X', 'X', '.', '.', 'X', 'X', '.', 'GC', 'X'],
            ['X', 'W', 'GB', 'GY', 'X', 'X', 'X', 'X', '.', '.', '.', 'X'],
            ['X', '.', '.', '.', 'B', 'C', 'Y', 'R', '.', '.', '.', 'X'],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

        ];
        $game = new state(5, 12, $d);
        break;
    case '6':
        $d = [

            ['.', '.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.'],
            ['.', '.', '.', '.', 'X', 'X', '.', 'R', '.', 'X', 'X', 'X'],
            ['X', 'X', 'X', 'X', 'X', '.', '.', '.', 'Y', '.', '.', 'X'],
            ['X', 'C', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            ['X', 'B', 'GB', 'X', '.', '.', 'X', 'X', 'X', 'X', '.', 'X'],
            ['X', 'X', 'X', 'X', '.', 'W', '.', 'X', 'X', 'X', '.', 'X'],
            ['.', '.', '.', 'X', '.', 'GY', '.', 'X', 'X', 'X', '.', 'X'],
            ['.', '.', '.', 'X', '.', 'GR', '.', '.', '.', '.', '.', 'X'],
            ['.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],
            // ['.', '.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.'],
            // ['.', '.', '.', '.', 'X', 'X', '.', 'R', '.', 'X', 'X', 'X'],
            // ['X', 'X', 'X', 'X', 'X', '.', '.', '.', 'Y', '.', '.', 'X'],
            // ['X', 'C', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            // ['X', 'B', 'GB', 'X', '.', 'W', 'X', 'X', 'X', 'X', '.', 'X'],
            // ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            // ['X', 'X', 'X', 'X', '.', 'GY', '.', 'X', 'X', 'X', '.', 'X'],
            // ['.', '.', '.', 'X', '.', 'GR', '.', 'X', 'X', 'X', '.', 'X'],
            // ['.', '.', '.', 'X', '.', '.', '.', '.', '.', '.', '.', 'X'],
            // ['.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],

        ];
        $game = new state(10, 12, $d);
        break;
    default:
        echo "Invalid move" . PHP_EOL;
        exit;
}
$player = new GamePlayer($game);
//$player->play();

$choosalgo = readline("Enter d or b or c or dr To choose the Algorithm DFS or BFS or UCS or DFS_Recursive:");

switch ($choosalgo) {
    case 'd':
        $start_time = microtime(true);
        $result = $player->dfs();
        $end_time = microtime(true);
        break;
    case 'dr':
        $start_time = microtime(true);
        $player->dfsRecursive();
        $end_time = microtime(true);
        break;
    case "b":
        $start_time = microtime(true);
        $result = $player->bfs();
        $end_time = microtime(true);
        break;
    case "c":
        $start_time = microtime(true);
        $result = $player->ucs();
        $end_time = microtime(true);
        break;
    default:
        echo "invalid Enter";
}
$execution_time = $end_time - $start_time;
echo "Execution time: " . $execution_time . " seconds";
