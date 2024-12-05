<?php
require 'vendor/autoload.php';

use DeepCopy\DeepCopy;

class state
{
    public $n;
    public $col;
    public $board;


    public function __construct($n, $col, $board)
    {
        $this->n = $n;
        $this->col = $col;
        $this->board = $board;
    }

    public function printBoard()
    {
        foreach ($this->board as $row) {
            echo implode(' ', $row) . PHP_EOL;
        }
        echo PHP_EOL;
    }


    public function isValidMove($x, $y, $dx, $dy)
    {
        $invalidCells = [
            'X',
            'Y',
            'R',
            'B',
            'C',
            'O',
            'GR,Y',
            'GY,R',
            'GB,Y',
            'GB,R',
            'GY,B',
            'GR,B',
            'GR,R',
            'GB,B',
            'GY,Y',
            'GC,C',
            'GC,Y',
            'GC,R',
            'GC,B',
            'GY,C',
            'GR,C',
            'GB,C',
            'GC,O',
            'GB,O',
            'GY,O',
            'GR,O',
            'GO,O',
            'GO,C',
            'GO,B',
            'GO,R',
            'GO,Y',
        ];
        $newX = $x + $dx;
        $newY = $y + $dy;
        return isset($this->board[$newX][$newY]) && !in_array($this->board[$newX][$newY], $invalidCells);
    }

    public function getMoveCost()
    {
        $directions = [
            [0, 1],   // Right
            [0, -1],  // Left
            [-1, 0],  // Up
            [1, 0]    // Down
        ];

        $totalCost = 0;

        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                if (
                    $this->board[$x][$y] === 'Y'
                    || $this->board[$x][$y] === 'R'
                    || $this->board[$x][$y] === 'B'
                    || $this->board[$x][$y] === 'C'
                    || $this->board[$x][$y] === 'O'
                    || $this->board[$x][$y] === 'GB,Y'
                    || $this->board[$x][$y] === 'GB,R'
                    || $this->board[$x][$y] === 'GB,C'
                    || $this->board[$x][$y] === 'GB,B'
                    || $this->board[$x][$y] === 'GB,O'
                    || $this->board[$x][$y] === 'GY,R'
                    || $this->board[$x][$y] === 'GY,B'
                    || $this->board[$x][$y] === 'GY,C'
                    || $this->board[$x][$y] === 'GY,Y'
                    || $this->board[$x][$y] === 'GY,O'
                    || $this->board[$x][$y] === 'GR,Y'
                    || $this->board[$x][$y] === 'GR,B'
                    || $this->board[$x][$y] === 'GR,R'
                    || $this->board[$x][$y] === 'GR,C'
                    || $this->board[$x][$y] === 'GR,O'
                    || $this->board[$x][$y] === 'GC,Y'
                    || $this->board[$x][$y] === 'GC,R'
                    || $this->board[$x][$y] === 'GC,B'
                    || $this->board[$x][$y] === 'GC,C'
                    || $this->board[$x][$y] === 'GC,O'
                    || $this->board[$x][$y] === 'GO,O'
                    || $this->board[$x][$y] === 'GO,C'
                    || $this->board[$x][$y] === 'GO,R'
                    || $this->board[$x][$y] === 'GO,B'
                    || $this->board[$x][$y] === 'GO,Y'
                ) {
                    foreach ($directions as $direction) {
                        $dx = $direction[0];
                        $dy = $direction[1];

                        $newX = $x + $dx;
                        $newY = $y + $dy;

                        if (isset($this->board[$newX][$newY]) && $this->isValidMove($x, $y, $dx, $dy)) {
                            $totalCost += 1;
                        }
                    }
                }
            }
        }

        return $totalCost;
    }



    public function NextStep()
    {
        $deepcopy = new DeepCopy();

        $possibleBoards = [];
        $directions = [
            [0, 1],   // Right
            [0, -1],  // Left
            [-1, 0],  // Up
            [1, 0]    // Down
        ];

        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                if (
                    $this->board[$x][$y] === 'Y'
                    || $this->board[$x][$y] === 'R'
                    || $this->board[$x][$y] === 'B'
                    || $this->board[$x][$y] === 'C'
                    || $this->board[$x][$y] === 'O'
                    || $this->board[$x][$y] === 'GB,Y'
                    || $this->board[$x][$y] === 'GB,R'
                    || $this->board[$x][$y] === 'GB,C'
                    || $this->board[$x][$y] === 'GB,B'
                    || $this->board[$x][$y] === 'GB,O'
                    || $this->board[$x][$y] === 'GY,R'
                    || $this->board[$x][$y] === 'GY,B'
                    || $this->board[$x][$y] === 'GY,C'
                    || $this->board[$x][$y] === 'GY,Y'
                    || $this->board[$x][$y] === 'GY,O'
                    || $this->board[$x][$y] === 'GR,Y'
                    || $this->board[$x][$y] === 'GR,B'
                    || $this->board[$x][$y] === 'GR,R'
                    || $this->board[$x][$y] === 'GR,C'
                    || $this->board[$x][$y] === 'GR,O'
                    || $this->board[$x][$y] === 'GC,Y'
                    || $this->board[$x][$y] === 'GC,R'
                    || $this->board[$x][$y] === 'GC,B'
                    || $this->board[$x][$y] === 'GC,C'
                    || $this->board[$x][$y] === 'GC,O'
                    || $this->board[$x][$y] === 'GO,O'
                    || $this->board[$x][$y] === 'GO,C'
                    || $this->board[$x][$y] === 'GO,R'
                    || $this->board[$x][$y] === 'GO,B'
                    || $this->board[$x][$y] === 'GO,Y'
                ) {
                    foreach ($directions as $direction) {
                        $dx = $direction[0];
                        $dy = $direction[1];
                        $newBoard = $deepcopy->copy($this);
                        if ($this->isValidMove($x, $y, $dx, $dy)) {
                            $newBoard->move($dx, $dy);
                            if (!$this->isBoardInArray($possibleBoards, $newBoard->board)) {
                                $possibleBoards[] = $deepcopy->copy($newBoard);
                            }
                        }
                    }
                }
            }
        }

        return $possibleBoards;
    }



    public function isBoardInArray($boards, $newBoard)
    {
        foreach ($boards as $board) {
            if ($this->areBoardsEqual($board->board, $newBoard)) {
                return true;
            }
        }
        return false;
    }
    public function areBoardsEqual($board1, $board2)
    {
        for ($i = 0; $i < count($board1); $i++) {
            if ($board1[$i] !== $board2[$i]) {
                return false;
            }
        }
        return true;
    }
    public function move($dx, $dy)
    {
        $newBoard = $this->board;
        $rangeX = $dx > 0 ? range($this->n - 1, 0, -1) : range(0, $this->n - 1);
        $rangeY = $dy > 0 ? range($this->col - 1, 0, -1) : range(0, $this->col - 1);
        foreach ($rangeX as $x) {
            foreach ($rangeY as $y) {
                if (in_array(
                    $this->board[$x][$y],
                    [
                        "Y",
                        "R",
                        "B",
                        "C",
                        "O",
                        'GB,Y',
                        'GB,R',
                        'GB,B',
                        'GB,C',
                        'GB,O',
                        "GY,R",
                        'GY,Y',
                        'GY,B',
                        'GY,C',
                        'GY,O',
                        "GR,Y",
                        'GR,B',
                        'GR,R',
                        'GR,C',
                        'GR,O',
                        'GC,Y',
                        'GC,R',
                        'GC,B',
                        'GC,C',
                        'GC,O',
                        'GO,O',
                        'GO,C',
                        'GO,R',
                        'GO,Y',
                        'GO,B',
                    ]
                )) {
                    $nx = $x;
                    $ny = $y;

                    while ($this->isValidMove($nx, $ny, $dx, $dy)) {
                        $nx += $dx;
                        $ny += $dy;

                        if ($newBoard[$x][$y] === "Y") {
                            if ($this->board[$nx][$ny] === 'GY') {

                                $newBoard[$x][$y] = '.';
                                $newBoard[$nx][$ny] = '.';
                                continue 3;
                            }
                        }
                        if ($newBoard[$x][$y] === "R") {
                            if ($this->board[$nx][$ny] === 'GR') {

                                $newBoard[$x][$y] = '.';
                                $newBoard[$nx][$ny] = '.';
                                continue 3;
                            }
                        }
                        if ($newBoard[$x][$y] === "B") {
                            if ($this->board[$nx][$ny] === 'GB') {

                                $newBoard[$x][$y] = '.';
                                $newBoard[$nx][$ny] = '.';
                                continue 3;
                            }
                        }
                        if ($newBoard[$x][$y] === "C") {
                            if ($this->board[$nx][$ny] === 'GC') {

                                $newBoard[$x][$y] = '.';
                                $newBoard[$nx][$ny] = '.';
                                continue 3;
                            }
                        }
                        if ($newBoard[$x][$y] === "O") {
                            if ($this->board[$nx][$ny] === 'GO') {

                                $newBoard[$x][$y] = '.';
                                $newBoard[$nx][$ny] = '.';
                                continue 3;
                            }
                        }

                        if ($newBoard[$nx][$ny] === "W") {
                            if ($newBoard[$x][$y] === "R") {
                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GR,R";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GR";
                                }
                            }
                            if ($newBoard[$x][$y] === "O") {
                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GO,O";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GO";
                                }
                            }
                            if ($newBoard[$x][$y] === "B") {
                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GB,B";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GB";
                                } // $newBoard[$x][$y] = "GR";
                            }
                            if ($newBoard[$x][$y] === "Y") {
                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GY,Y";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GY";
                                } // $newBoard[$x][$y] = "GR";
                            }

                            if ($newBoard[$x][$y] === "C") {

                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GC,C";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GC";
                                }
                            } else if ($newBoard[$nx][$ny] === "GC") {
                                $newBoard[$nx][$ny] = ".";
                            }
                        } else if (
                            ($newBoard[$nx][$ny] === "GR" && $newBoard[$x][$y] === "R") ||
                            ($newBoard[$nx][$ny] === "GB" && $newBoard[$x][$y] === "B") ||
                            ($newBoard[$nx][$ny] === "GY" && $newBoard[$x][$y] === "Y") ||
                            ($newBoard[$nx][$ny] === "GC" && $newBoard[$x][$y] === "C") ||
                            ($newBoard[$nx][$ny] === "GO" && $newBoard[$x][$y] === "O")
                        ) {

                            $newBoard[$nx][$ny] = ".";
                        }
                    }
                    while ($newBoard[$nx][$ny] === '.' && $newBoard[$nx + $dx][$ny + $dy] === '.') {
                        $nx += $dx;
                        $ny += $dy;
                    }



                    if ($newBoard[$nx][$ny] === "b") {
                        $newBoard[$nx][$ny] = "b";
                        $newBoard[$x][$y] = ".";
                    }


                    if ($newBoard[$nx][$ny] === 'GY' && $newBoard[$x][$y] === "R") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GY,R";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GR' && $newBoard[$x][$y] === "Y") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GR,Y";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GR' && $newBoard[$x][$y] === "B") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GR,B";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GY' && $newBoard[$x][$y] === "B") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GY,B";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GB' && $newBoard[$x][$y] === "Y") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GB,Y";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GB' && $newBoard[$x][$y] === "R") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GB,R";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GC' && $newBoard[$x][$y] === "Y") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GC,Y";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GC' && $newBoard[$x][$y] === "R") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GC,R";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GC' && $newBoard[$x][$y] === "B") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GC,B";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GY' && $newBoard[$x][$y] === "C") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GY,C";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GB' && $newBoard[$x][$y] === "C") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GB,C";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GR' && $newBoard[$x][$y] === "C") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GR,C";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GR' && $newBoard[$x][$y] === "O") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GR,O";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GC' && $newBoard[$x][$y] === "O") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GC,O";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GB' && $newBoard[$x][$y] === "O") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GB,O";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GY' && $newBoard[$x][$y] === "O") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GY,O";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GO' && $newBoard[$x][$y] === "C") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GO,C";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GO' && $newBoard[$x][$y] === "R") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GO,R";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GO' && $newBoard[$x][$y] === "B") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GO,B";
                        }
                    }
                    if ($newBoard[$nx][$ny] === 'GO' && $newBoard[$x][$y] === "Y") {
                        if ($newBoard[$nx + $dx][$ny + $dy] === 'X') {
                            $newBoard[$x][$y] = ".";
                            $newBoard[$nx][$ny] = "GO,Y";
                        }
                    }


                    if ($newBoard[$nx][$ny] === '.') {
                        if ($newBoard[$x][$y] === "Y") {
                            $newBoard[$x][$y] = '.';
                            $newBoard[$nx][$ny] = 'Y';
                        } else if ($newBoard[$x][$y] === "R") {
                            $newBoard[$x][$y] = '.';
                            $newBoard[$nx][$ny] = 'R';
                        } else if ($newBoard[$x][$y] === "B") {
                            $newBoard[$x][$y] = '.';
                            $newBoard[$nx][$ny] = 'B';
                        } else if ($newBoard[$x][$y] === "C") {
                            $newBoard[$x][$y] = '.';
                            $newBoard[$nx][$ny] = 'C';
                        } else if ($newBoard[$x][$y] === "O") {
                            $newBoard[$x][$y] = '.';
                            $newBoard[$nx][$ny] = 'O';
                        } else if ($newBoard[$x][$y] === "GY,R") {
                            $newBoard[$x][$y] = 'GY';
                            $newBoard[$nx][$ny] = 'R';
                        } else if ($newBoard[$x][$y] === "GR,Y") {
                            $newBoard[$x][$y] = 'GR';
                            $newBoard[$nx][$ny] = 'Y';
                        } else if ($newBoard[$x][$y] === "GY,B") {
                            $newBoard[$x][$y] = 'GY';
                            $newBoard[$nx][$ny] = 'B';
                        } else if ($newBoard[$x][$y] === "GR,B") {
                            $newBoard[$x][$y] = 'GR';
                            $newBoard[$nx][$ny] = 'B';
                        } else if ($newBoard[$x][$y] === "GB,Y") {
                            $newBoard[$x][$y] = 'GB';
                            $newBoard[$nx][$ny] = 'Y';
                        } else if ($newBoard[$x][$y] === "GB,R") {
                            $newBoard[$x][$y] = 'GB';
                            $newBoard[$nx][$ny] = 'R';
                        } elseif ($newBoard[$x][$y] === "GR,R") {
                            $newBoard[$x][$y] = 'GR';
                            $newBoard[$nx][$ny] = 'R';
                        } elseif ($newBoard[$x][$y] === "GB,B") {
                            $newBoard[$x][$y] = 'GB';
                            $newBoard[$nx][$ny] = 'B';
                        } elseif ($newBoard[$x][$y] === "GY,Y") {
                            $newBoard[$x][$y] = 'GY';
                            $newBoard[$nx][$ny] = 'Y';
                        } elseif ($newBoard[$x][$y] === "GC,C") {
                            $newBoard[$x][$y] = 'GC';
                            $newBoard[$nx][$ny] = 'C';
                        } elseif ($newBoard[$x][$y] === "GC,Y") {
                            $newBoard[$x][$y] = 'GC';
                            $newBoard[$nx][$ny] = 'Y';
                        } elseif ($newBoard[$x][$y] === "GC,R") {
                            $newBoard[$x][$y] = 'GC';
                            $newBoard[$nx][$ny] = 'R';
                        } elseif ($newBoard[$x][$y] === "GC,B") {
                            $newBoard[$x][$y] = 'GC';
                            $newBoard[$nx][$ny] = 'B';
                        } elseif ($newBoard[$x][$y] === "GY,C") {
                            $newBoard[$x][$y] = 'GY';
                            $newBoard[$nx][$ny] = 'C';
                        } elseif ($newBoard[$x][$y] === "GR,C") {
                            $newBoard[$x][$y] = 'GR';
                            $newBoard[$nx][$ny] = 'C';
                        } elseif ($newBoard[$x][$y] === "GB,C") {
                            $newBoard[$x][$y] = 'GB';
                            $newBoard[$nx][$ny] = 'C';
                        } elseif ($newBoard[$x][$y] === "GB,O") {
                            $newBoard[$x][$y] = 'GB';
                            $newBoard[$nx][$ny] = 'O';
                        } elseif ($newBoard[$x][$y] === "GC,O") {
                            $newBoard[$x][$y] = 'GC';
                            $newBoard[$nx][$ny] = 'O';
                        } elseif ($newBoard[$x][$y] === "GR,O") {
                            $newBoard[$x][$y] = 'GR';
                            $newBoard[$nx][$ny] = 'O';
                        } elseif ($newBoard[$x][$y] === "GY,O") {
                            $newBoard[$x][$y] = 'GY';
                            $newBoard[$nx][$ny] = 'O';
                        } elseif ($newBoard[$x][$y] === "GO,O") {
                            $newBoard[$x][$y] = 'GO';
                            $newBoard[$nx][$ny] = 'O';
                        } elseif ($newBoard[$x][$y] === "GO,R") {
                            $newBoard[$x][$y] = 'GO';
                            $newBoard[$nx][$ny] = 'R';
                        } elseif ($newBoard[$x][$y] === "GO,Y") {
                            $newBoard[$x][$y] = 'GO';
                            $newBoard[$nx][$ny] = 'Y';
                        } elseif ($newBoard[$x][$y] === "GO,C") {
                            $newBoard[$x][$y] = 'GO';
                            $newBoard[$nx][$ny] = 'C';
                        } elseif ($newBoard[$x][$y] === "GO,B") {
                            $newBoard[$x][$y] = 'GO';
                            $newBoard[$nx][$ny] = 'B';
                        }
                    }
                }
            }
        }
        $this->board = $newBoard;
    }

    public function isWinningState()
    {
        foreach ($this->board as $row) {
            foreach ($row as $cell) {
                if (
                    $cell === 'GY'
                    || $cell === 'GR'
                    || $cell === 'GB'
                    || $cell === 'GY'
                    || $cell === 'GC'
                    || $cell === 'GO'
                    || $cell === 'GR,Y'
                    || $cell === 'GR,C'
                    || $cell === 'GR,B'
                    || $cell === 'GR,R'
                    || $cell === 'GR,O'
                    || $cell === 'GY,R'
                    || $cell === 'GY,B'
                    || $cell === 'GY,C'
                    || $cell === 'GY,Y'
                    || $cell === 'GY,O'
                    || $cell === 'GB,Y'
                    || $cell === 'GB,R'
                    || $cell === 'GB,C'
                    || $cell === 'GB,B'
                    || $cell === 'GB,O'
                    || $cell === 'GC,Y'
                    || $cell === 'GC,R'
                    || $cell === 'GC,B'
                    || $cell === 'GC,C'
                    || $cell === 'GC,O'
                    || $cell === 'GO,O'
                    || $cell === 'GO,C'
                    || $cell === 'GO,R'
                    || $cell === 'GO,Y'
                    || $cell === 'GO,B'
                    || $cell === 'W'
                ) {
                    return false;
                }
            }
        }
        return true;
    }
    public function isGameOver()
    {
        $validTargets = ['GR', 'GB', 'GY', 'GC', 'GO'];
        $coloredBlocks = ['Y', 'B', 'C', 'R', 'O'];
        $allowedInteractions = [
            'GR,Y',
            'GR,C',
            'GR,R',
            'GR,B',
            'GR,O',
            'GC,Y',
            'GC,C',
            'GC,O',
            'GC,R',
            'GC,B',
            'GB,Y',
            'GB,C',
            'GB,R',
            'GB,B',
            'GB,O',
            'GY,Y',
            'GY,C',
            'GY,R',
            'GY,B',
            'GY,O',
            'GO,Y',
            'GO,C',
            'GO,R',
            'GO,B',
            'GO,O',
        ];

        $targetCounts = [];
        $hasW = false;
        $coloredWithoutTarget = [];
        $blocksOnB = [];

        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                $cell = $this->board[$x][$y];

                if ($cell === 'W') {
                    $hasW = true;
                }


                if (in_array($cell, $validTargets)) {
                    if (!isset($targetCounts[$cell])) {
                        $targetCounts[$cell] = 0;
                    }
                    $targetCounts[$cell]++;
                }


                if (in_array($cell, $coloredBlocks)) {
                    $correspondingTarget = 'G' . $cell;
                    if (!$this->targetExists($correspondingTarget)) {
                        $coloredWithoutTarget[] = $cell;
                    }
                }

                if ($cell === 'b') {
                    $blocksOnB[] = $cell;
                }
            }
        }


        foreach ($targetCounts as $count) {
            if ($count > 1) {
                return true;
            }
        }

        if (!$hasW && !empty($coloredWithoutTarget)) {
            return true;
        }


        if (!empty($blocksOnB)) {
            foreach ($blocksOnB as $block) {
                $correspondingTarget = 'G' . $block;
                if ($this->targetExists($correspondingTarget)) {
                    return true;
                }
            }
        }


        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                $cell = $this->board[$x][$y];
                if (in_array($cell, $coloredBlocks)) {
                    foreach ($validTargets as $target) {
                        $interaction = $target . ',' . $cell;
                        if (!in_array($interaction, $allowedInteractions)) {
                            return true;
                        }
                    }
                }
            }
        }

        foreach ($coloredBlocks as $block) {
            $correspondingTarget = 'G' . $block;
            if ($this->targetExists($correspondingTarget) && isset($targetCounts[$correspondingTarget]) && $targetCounts[$correspondingTarget] > 1) {
                return true;
            }
        }


        return false;
    }
    private function targetExists($target)
    {
        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                if ($this->board[$x][$y] === $target) {
                    return true;
                }
            }
        }
        return false;
    }





    public function advHeuristicValue()
    {
        $score = 0;


        if ($this->isGameOver()) {
            return PHP_INT_MAX;
        }
        $targets = [
            'B' => 'GB',
            'R' => 'GR',
            'Y' => 'GY',
            'C' => 'GC',
            'O' => 'GO',

            'GR,Y' => 'GY',
            'GC,Y' => 'GY',
            'GB,Y' => 'GY',
            'GO,Y' => 'GY',
            'GY,Y' => 'GY',

            'GB,C' => 'GC',
            'GR,C' => 'GC',
            'GY,C' => 'GC',
            'GO,C' => 'GC',
            'GC,C' => 'GC',

            'GY,R' => 'GR',
            'GC,R' => 'GR',
            'GB,R' => 'GR',
            'GO,R' => 'GR',
            'GR,R' => 'GR',

            'GC,B' => 'GB',
            'GY,B' => 'GB',
            'GR,B' => 'GB',
            'GO,B' => 'GB',
            'GB,B' => 'GB',

            'GC,O' => 'GO',
            'GY,O' => 'GO',
            'GR,O' => 'GO',
            'GO,O' => 'GO',
            'GB,O' => 'GO',

        ];


        $locations = [];
        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                $cell = $this->board[$x][$y];
                if (array_key_exists($cell, $targets) || in_array($cell, $targets)) {
                    $locations[$cell] = [$x, $y];
                }
            }
        }


        foreach ($targets as $box => $goal) {
            if (isset($locations[$box]) && isset($locations[$goal])) {
                $boxLocation = $locations[$box];
                $goalLocation = $locations[$goal];
                $distance = abs($boxLocation[0] - $goalLocation[0]) + abs($boxLocation[1] - $goalLocation[1]);
                $score += $distance;
            }
        }

        return $score;
    }
    public function getHeuristicValue()
    {
        $score = 0;

        $targets = [
            'B' => 'GB',
            'R' => 'GR',
            'Y' => 'GY',
            'C' => 'GC',
            'O' => 'GO',

            'GR,Y' => 'GY',
            'GC,Y' => 'GY',
            'GB,Y' => 'GY',
            'GO,Y' => 'GY',
            'GY,Y' => 'GY',

            'GB,C' => 'GC',
            'GR,C' => 'GC',
            'GY,C' => 'GC',
            'GO,C' => 'GC',
            'GC,C' => 'GC',

            'GY,R' => 'GR',
            'GC,R' => 'GR',
            'GB,R' => 'GR',
            'GO,R' => 'GR',
            'GR,R' => 'GR',

            'GC,B' => 'GB',
            'GY,B' => 'GB',
            'GR,B' => 'GB',
            'GO,B' => 'GB',
            'GB,B' => 'GB',

            'GC,O' => 'GO',
            'GY,O' => 'GO',
            'GR,O' => 'GO',
            'GO,O' => 'GO',
            'GB,O' => 'GO',

        ];


        $locations = [];
        for ($x = 0; $x < $this->n; $x++) {
            for ($y = 0; $y < $this->col; $y++) {
                $cell = $this->board[$x][$y];
                if (array_key_exists($cell, $targets) || in_array($cell, $targets)) {
                    $locations[$cell] = [$x, $y];
                }
            }
        }


        foreach ($targets as $box => $goal) {
            if (isset($locations[$box]) && isset($locations[$goal])) {
                $boxLocation = $locations[$box];
                $goalLocation = $locations[$goal];
                $distance = abs($boxLocation[0] - $goalLocation[0]) + abs($boxLocation[1] - $goalLocation[1]);
                $score += $distance;
            }
        }

        return $score;
    }
}
