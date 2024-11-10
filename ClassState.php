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
            'GB,C'
        ];
        $newX = $x + $dx;
        $newY = $y + $dy;
        return isset($this->board[$newX][$newY]) && !in_array($this->board[$newX][$newY], $invalidCells);
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
                    || $this->board[$x][$y] === 'GY,R'
                    || $this->board[$x][$y] === 'GR,Y'
                    || $this->board[$x][$y] === 'GB,Y'
                    || $this->board[$x][$y] === 'GB,R'
                    || $this->board[$x][$y] === 'GY,B'
                    || $this->board[$x][$y] === 'GR,B'
                    || $this->board[$x][$y] === 'GR,R'
                    || $this->board[$x][$y] === 'GB,B'
                    || $this->board[$x][$y] === 'GY,Y'
                    || $this->board[$x][$y] === 'GC,Y'
                    || $this->board[$x][$y] === 'GC,R'
                    || $this->board[$x][$y] === 'GC,B'
                    || $this->board[$x][$y] === 'GY,C'
                    || $this->board[$x][$y] === 'GR,C'
                    || $this->board[$x][$y] === 'GB,C'
                    || $this->board[$x][$y] === 'GC,C'
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
                        "GY,R",
                        "GR,Y",
                        'GB,Y',
                        'GB,R',
                        'GY,B',
                        'GR,B',
                        'GR,R',
                        'GB,B',
                        'GY,Y',
                        'GC,Y',
                        'GC,R',
                        'GC,B',
                        'GY,C',
                        'GR,C',
                        'GB,C',
                        'GC,C'
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

                        if ($newBoard[$nx][$ny] === "W") {
                            if ($newBoard[$x][$y] === "R") {
                                if ($newBoard[$nx + $dx][$ny + $dy] === "X") {
                                    $newBoard[$nx][$ny] = "GR,R";
                                    $newBoard[$x][$y] = ".";
                                } else {
                                    $newBoard[$nx][$ny] = "GR";
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
                            ($newBoard[$nx][$ny] === "GC" && $newBoard[$x][$y] === "C")
                        ) {

                            $newBoard[$nx][$ny] = ".";
                        }
                    }
                    while ($newBoard[$nx][$ny] === '.' && $newBoard[$nx + $dx][$ny + $dy] === '.') {
                        $nx += $dx;
                        $ny += $dy;
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
                    || $cell === 'GR,Y'
                    || $cell === 'GY,R'
                    || $cell === 'GY,B'
                    || $cell === 'GR,B'
                    || $cell === 'GB,Y'
                    || $cell === 'GB,R'
                    || $cell === 'GC,Y'
                    || $cell === 'GC,R'
                    || $cell === 'GC,B'
                    || $cell === 'GY,C'
                    || $cell === 'GR,C'
                    || $cell === 'GB,C'
                    || $cell === 'GB,B'
                    || $cell === 'GC,C'
                    || $cell === 'GY,Y'
                    || $cell === 'GR,R'
                ) {
                    return false;
                }
            }
        }
        return true;
    }
}
