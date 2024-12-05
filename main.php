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

$choose = readline("Choose The Board You prefer To Play (10/20/30/1/3/5/6): ");

switch ($choose) {
    case '1':

        $a = [
            // ['.', 'X', 'X', 'X', 'X', '.', '.', '.'],
            // ['X', 'X', 'Y', '.', 'X', 'X', 'X', '.'],
            // ['X', '.', '.', '.', 'X', 'GY', 'X', '.'],
            // ['X', '.', '.', '.', '.', '.', 'X', 'X'],
            // ['X', '.', '.', '.', '.', '.', 'GR', 'X'],
            // ['X', '.', '.', 'X', '.', '.', 'X', 'X'],
            // ['X', 'R', '.', 'X', 'X', 'X', 'X', '.'],
            // ['X', 'X', 'X', 'X', '.', '.', '.', '.']

            [".", "X", "X", "X", "X", "X", ".", ".", ".", ".", "."],
            ["X", "X", "R", ".", ".", "X", "X", "X", "X", "X", "."],
            ["X", ".", ".", ".", ".", "X", "X", "GB", ".", "X", "."],
            ["X", ".", ".", ".", ".", ".", ".", ".", ".", "X", "X"],
            ["X", ".", ".", ".", "X", "X", "X", ".", ".", "GR", "X"],
            ["X", ".", ".", ".", ".", ".", ".", ".", ".", "X", "X"],
            ["X", "X", "B", ".", "X", "X", "X", "X", "X", "X", "."],
            [".", "X", "X", "X", "X", ".", ".", ".", ".", ".", "."]
        ];

        $game = new state(8, 11, $a);
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
    case '10':
        $c = [
            ['.', '.', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '.', '.', '.'],
            ['.', 'X', 'X', '.', '.', '.', '.', '.', '.', 'X', 'X', '.'],
            ['X', 'X', '.', '.', 'X', '.', 'GB', 'X', '.', '.', 'X', 'X'],
            ['X', '.', '.', 'X', '.', 'GR', '.', '.', 'X', '.', '.', 'X'],
            ['X', '.', '.', '.', '.', 'X', '.', '.', 'X', 'X', '.', 'X'],
            ['X', 'R', 'X', '.', 'X', 'X', '.', '.', '.', 'X', 'B', 'X'],
            ['X', '.', '.', '.', 'X', '.', '.', '.', '.', '.', '.', 'X'],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],


        ];
        $game = new state(8, 12, $c);
        break;
    case '20':
        $d = [
            ['.', '.', 'X', 'X', 'X', 'X', 'X', '.', '.',],
            ['X', 'X', 'X', 'X', 'R', 'GY', 'X', 'X', 'X',],
            ['X', 'GB', 'O', 'B', '.', '.', '.', '.', 'X',],
            ['X', '.', 'GO,C', 'X', 'GR', '.', 'X', 'GC,Y', 'X',],
            ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X',],
        ];
        $game = new state(5, 9, $d);
        break;
    case '30':
        $d = [
            ['.', '.', '.', 'X', 'X', 'X', 'X', 'X', 'X', '.', 'X', 'X', 'X', 'X', 'X', 'X'],
            ['X', 'X', 'X', 'X', 'X', '.', '.', 'GR', 'X', 'X', 'X', 'GY', 'X', 'X', 'GO', 'X'],
            ['X', 'R', 'B', 'O', '.', '.', 'X', '.', '.', '.', '.', '.', '.', '.', '.', 'X'],
            ['X', 'Y', 'C', '.', '.', '.', '.', '.', '.', '.', '.', '.', 'X', '.', '.', 'X'],
            ['X', 'X', 'X', 'X', 'X', 'W', 'X', 'X', 'GB', 'X', 'X', 'X', 'X', 'X', 'X', 'X'],
            ['.', '.', '.', '.', 'X', 'X', 'X', 'X', 'b', 'X', '.', '.', '.', '.', '.', '.'],
        ];
        $game = new state(6, 16, $d);
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
            ['X', 'O', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            ['X', '.', '.', '.', '.', '.', '.', '.', '.', 'X', '.', 'X'],
            ['X', 'B', 'GB', 'X', '.', '.', 'X', 'X', 'X', 'X', '.', 'X'],
            ['X', 'X', 'X', 'X', '.', 'W', '.', 'X', 'X', 'X', '.', 'X'],
            ['.', '.', '.', 'X', '.', '.', '.', 'X', 'X', 'X', '.', 'X'],
            ['.', '.', '.', 'X', '.', '.', 'GR', 'GY', '.', '.', '.', 'X'],
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


$choosalgo = readline("Enter player to play or Enter dfs or bfs or ucs or dfsrec or a* or advanA* or simplehill or steepesthill To choose the Algorithm DFS or BFS or UCS or DFS_Recursive  or ASTAR or advanceA* or Simplehill or Steepesthill:");

switch ($choosalgo) {
    case 'player':
        $start_time = microtime(true);
        $player->play();
        $end_time = microtime(true);
        break;
    case 'dfs':
        $start_time = microtime(true);
        $result = $player->dfs();
        $end_time = microtime(true);
        break;
    case 'dfsrec':
        $start_time = microtime(true);
        $player->dfsRecursive();
        $end_time = microtime(true);
        break;
    case "bfs":
        $start_time = microtime(true);
        $result = $player->bfs();
        $end_time = microtime(true);
        break;
    case "ucs":
        $start_time = microtime(true);
        $result = $player->ucs();
        $end_time = microtime(true);
        break;
    case "a*":
        $start_time = microtime(true);
        $result = $player->aStarwithHeuristic();
        $end_time = microtime(true);
        break;
    case "advanA*":
        $start_time = microtime(true);
        $result = $player->aStarwithAdvHeuristic();
        $end_time = microtime(true);
        break;
    case "simplehill":
        $start_time = microtime(true);
        $result = $player->simpleHillClimbing();
        $end_time = microtime(true);
        break;
    case "steepesthill":
        $start_time = microtime(true);
        $result = $player->steepestAscentHillClimbing();
        $end_time = microtime(true);
        break;
    default:
        echo "invalid Enter";
}
$execution_time = $end_time - $start_time;
echo "Execution time: " . $execution_time . " seconds";
$player->logExecutionDetails($execution_time, $choose, $choosalgo);
