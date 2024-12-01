<?php
require_once 'ClassState.php';
require 'vendor/autoload.php';

use DeepCopy\DeepCopy;

class GamePlayer
{
    public $init;
    public $current_state;
    public $states;

    public $stack;
    public $queue;
    public $priorityQueue;
    public $visited;
    public function __construct($init)
    {
        $this->init = $init;
        $deepcopy = new DeepCopy();
        $this->current_state = $deepcopy->copy($this->init);
        $this->states = [];
        $this->stack = [];
        $this->stack[] = $this->init;
        $this->visited = [];
        $this->queue = new SplQueue();
        $this->priorityQueue = new SplPriorityQueue();
    }
    private function giveHint()
    {
        $possibleMoves = $this->current_state->NextStep();
        echo "Possible moves after this:\n";
        foreach ($possibleMoves as $index => $obj) {
            echo "Move " . ($index + 1) . ":\n";
            $obj->printBoard();
            echo PHP_EOL;
        }
    }
    public function play()
    {

        $deepcopy = new DeepCopy();
        $this->states[] = $this->init;
        $this->current_state->printBoard();
        $this->giveHint();
        while (!$this->current_state->isWinningState()) {
            $move = readline("Enter move (w/a/s/d) -- Enter e to Exit: ");
            switch ($move) {
                case 'w':
                    $this->current_state->move(-1, 0);
                    $this->current_state->printBoard();
                    $this->states[] = $deepcopy->copy($this->current_state);

                    break;
                case 's':
                    $this->current_state->move(1, 0);
                    $this->current_state->printBoard();
                    $this->states[] = $deepcopy->copy($this->current_state);

                    break;
                case 'a':
                    $this->current_state->move(0, -1);
                    $this->current_state->printBoard();
                    $this->states[] = $deepcopy->copy($this->current_state);

                    break;
                case 'd':
                    $this->current_state->move(0, 1);
                    $this->current_state->printBoard();
                    $this->states[] = $deepcopy->copy($this->current_state);
                    break;
                case 'e':
                    return;
                default:
                    echo "Invalid move" . PHP_EOL;
                    break;
            }
            $this->giveHint();
            echo "Continue" . PHP_EOL;
            $this->current_state->printBoard();
        }
        echo "Congratulations! You've won!" . PHP_EOL;
        echo "Game States History:\n";
        foreach ($this->states as $step => $state) {
            echo "Step " . ($step + 1) . ":\n";
            $state->printBoard();
            echo str_repeat("-", 20) . PHP_EOL;
        }
    }
    public function hashBoard($board)
    {
        return md5(json_encode($board));
    }

    // DFS Algooo:
    public function dfs()
    {
        $deepcopy = new DeepCopy();
        $parentmap = [];
        $depth = 0;
        $visitnum = 0;
        while ($this->stack) {
            $this->current_state = array_pop($this->stack);
            $boardHash = $this->hashBoard($this->current_state->board);
            if ($this->current_state->isWinningState()) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                $this->states[] = $this->current_state;
                while (isset($parentmap[$boardHash])) {
                    $depth++;
                    $this->current_state = $parentmap[$boardHash];
                    $this->states[] = $this->current_state;
                    $boardHash = $this->hashBoard($this->current_state->board);
                }
                echo "Path to solution:\n";
                foreach (array_reverse($this->states) as $index => $state) {
                    echo "Board_Number : \n-" . $index . "-" . "\n";
                    $state->printBoard();
                    echo "\n";
                }
                echo "the depth of Dfs: " . $depth . "\n";
                break;
            }
            if (!isset($this->visited[$boardHash])) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                // $this->current_state->printBoard();
                $children = $this->current_state->NextStep();
                foreach ($children as $child) {
                    $childHash = $this->hashBoard($child->board);
                    if (!isset($this->visited[$childHash])) {
                        $this->stack[] = $child;
                        $parentmap[$childHash] = $deepcopy->copy($this->current_state);
                    }
                }
            }
        }
        echo "\nNumber of Visited :";
        echo "\n$visitnum\n";
        return null;
    }

    //BFS Algooo
    public function bfs()
    {
        $deepcopy = new DeepCopy();
        $parentmap = [];
        $depth = 0;
        $visitnum = 0;
        $this->queue->enqueue($this->init);

        while (!$this->queue->isEmpty()) {
            $this->current_state = $this->queue->dequeue();
            $boardHash = $this->hashBoard($this->current_state->board);
            if ($this->current_state->isWinningState()) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                $this->states[] = $this->current_state;
                while (isset($parentmap[$boardHash])) {
                    $depth++;
                    $this->current_state = $parentmap[$boardHash];
                    $this->states[] = $this->current_state;
                    $boardHash = $this->hashBoard($this->current_state->board);
                }
                echo "Path to solution:\n";
                foreach (array_reverse($this->states) as $index => $state) {
                    echo "Board_Number : \n-" . $index . "-" . "\n";
                    $state->printBoard();
                    echo "\n";
                }
                //var_dump($parentmap);
                echo "The depth of BFS: " . $depth . "\n";
                break;
            }
            if (!isset($this->visited[$boardHash])) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                //$this->current_state->printBoard();
                $children = $this->current_state->NextStep();
                foreach ($children as $child) {
                    $childHash = $this->hashBoard($child->board);
                    if (!isset($this->visited[$childHash])) {
                        $this->queue->enqueue($child);
                        $parentmap[$childHash] = $deepcopy->copy($this->current_state);
                    }
                }
            }
        }

        echo "\nNumber of Visited :";
        echo "\n$visitnum\n";
        return null;
    }


    /*
i add some change one of the change 
1- add usc in game player  
2- add fun getcostmove in class state
3- add anothe case to switch case to usc
*/

    //ucs algoo
    public function ucs()
    {
        $deepcopy = new DeepCopy();
        $parentmap = [];
        $depth = 0;
        $visitnum = 0;



        $this->priorityQueue->insert($this->init, 0);
        $costMap = [];
        $costMap[$this->hashBoard($this->init->board)] = 0;

        while (!$this->priorityQueue->isEmpty()) {
            $this->current_state = $this->priorityQueue->extract();
            $boardHash = $this->hashBoard($this->current_state->board);


            if ($this->current_state->isWinningState()) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                $this->states[] = $this->current_state;

                while (isset($parentmap[$boardHash])) {
                    $depth++;
                    $this->current_state = $parentmap[$boardHash];
                    $this->states[] = $this->current_state;
                    $boardHash = $this->hashBoard($this->current_state->board);
                }

                echo "Path to solution:\n";
                foreach (array_reverse($this->states) as $index => $state) {
                    echo "Board_Number : \n-" . $index . "-" . "\n";
                    $state->printBoard();
                    echo "\n";
                }

                echo "The depth of UCS: " . ($depth + 1) . "\n";
                break;
            }

            if (!isset($this->visited[$boardHash])) {
                $this->visited[$boardHash] = true;
                $visitnum++;


                $children = $this->current_state->NextStep();
                foreach ($children as $child) {
                    $childHash = $this->hashBoard($child->board);
                    $costToChild = $costMap[$boardHash] + $child->getMoveCost();


                    if (!isset($costMap[$childHash]) || $costToChild < $costMap[$childHash]) {
                        $this->priorityQueue->insert($child, -$costToChild);
                        $costMap[$childHash] = $costToChild;
                        $parentmap[$childHash] = $deepcopy->copy($this->current_state);
                    }
                }
            }
        }

        echo "\nNumber of Visited :";
        echo "\n$visitnum\n";
        echo "\nThe Cost Of Goal :";
        echo "\n$costToChild\n";
        return null;
    }

    // dfs recursive Algoo
    public function dfsRecursive($currentState = null, &$parentMap = [], $depth = 0)
    {
        if ($currentState === null) {
            $currentState = $this->current_state;
        }

        $boardHash = $this->hashBoard($currentState->board);

        if ($currentState->isWinningState()) {
            $this->visited[$boardHash] = true;
            echo "Path to solution:\n";
            while (isset($parentMap[$boardHash])) {
                $this->states[] = $currentState;
                $currentState = $parentMap[$boardHash];
                $boardHash = $this->hashBoard($currentState->board);
            }
            $this->states[] = $currentState;

            foreach (array_reverse($this->states) as $index => $state) {
                echo "Board_Number : \n-" . $index . "-" . "\n";
                $state->printBoard();
                echo "\n";
            }

            echo "The depth of DFS Recursive: " . $depth . "\n";
            echo "Number of Visited States: " . count($this->visited) . "\n";
            return true;
        }

        if (!isset($visited[$boardHash])) {
            $this->visited[$boardHash] = true;

            $children = $currentState->NextStep();
            foreach ($children as $child) {
                $childHash = $this->hashBoard($child->board);

                if (!isset($this->visited[$childHash])) {
                    $parentMap[$childHash] = $currentState;

                    if ($this->dfsRecursive($child,  $parentMap, $depth + 1)) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function aStar()
    {
        $deepcopy = new DeepCopy();
        $parentmap = [];
        $depth = 0;
        $visitnum = 0;


        $this->priorityQueue->insert($this->init, 0);
        $costMap = [];
        $costMap[$this->hashBoard($this->init->board)] = 0;

        while (!$this->priorityQueue->isEmpty()) {
            $this->current_state = $this->priorityQueue->extract();
            $boardHash = $this->hashBoard($this->current_state->board);

            if ($this->current_state->isWinningState()) {
                $this->visited[$boardHash] = true;
                $visitnum++;
                $this->states[] = $this->current_state;

                while (isset($parentmap[$boardHash])) {
                    $depth++;
                    $this->current_state = $parentmap[$boardHash];
                    $this->states[] = $this->current_state;
                    $boardHash = $this->hashBoard($this->current_state->board);
                }


                echo "Path to solution:\n";
                foreach (array_reverse($this->states) as $index => $state) {
                    echo "Board_Number : \n-" . $index . "-" . "\n";
                    $state->printBoard();
                    echo "\n";
                }

                echo "The depth of A* search: " . ($depth + 1) . "\n";
                break;
            }

            if (!isset($this->visited[$boardHash])) {
                $this->visited[$boardHash] = true;
                $visitnum++;


                $children = $this->current_state->NextStep();
                foreach ($children as $child) {
                    $childHash = $this->hashBoard($child->board);


                    $costToChild = $costMap[$boardHash] + $child->getMoveCost();


                    $heuristicValue = $child->getHeuristicValue();


                    $priority = $costToChild + $heuristicValue;


                    if (!isset($costMap[$childHash]) || $costToChild < $costMap[$childHash]) {
                        $this->priorityQueue->insert($child, -$priority);
                        $costMap[$childHash] = $costToChild;
                        $parentmap[$childHash] = $deepcopy->copy($this->current_state);
                    }
                }
            }
        }


        echo "\nNumber of Visited :";
        echo "\n$visitnum\n";
        echo "\nThe Cost Of Goal :";
        echo "\n" . ($costToChild) . "\n";
        return null;
    }
}
