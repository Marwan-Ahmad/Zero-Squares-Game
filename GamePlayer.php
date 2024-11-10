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
    public function dfs()
    {
        $deepcopy = new DeepCopy();
        $parentmap = [];
        $depth = 0;
        while ($this->stack) {
            $this->current_state = array_pop($this->stack);
            $boardHash = $this->hashBoard($this->current_state->board);
            if ($this->current_state->isWinningState()) {
                $this->visited[$boardHash] = true;
                $this->states[] = $this->current_state;
                while (isset($parentmap[$boardHash])) {
                    $depth++;
                    $this->current_state = $parentmap[$boardHash];
                    $this->states[] = $this->current_state;
                    $boardHash = $this->hashBoard($this->current_state->board);
                }
                echo "Path to solution:\n";
                foreach (array_reverse($this->states) as $state) {
                    $state->printBoard();
                    echo "\n";
                }
                echo "the depth of Dfs: " . $depth . "\n";
                break;
            }
            if (!isset($this->visited[$boardHash])) {
                $this->visited[$boardHash] = true;
                $this->current_state->printBoard();
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
        return null;
    }
}
