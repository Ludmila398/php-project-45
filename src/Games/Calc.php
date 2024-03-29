<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function Engine\play;

use const Engine\NUMBER_OF_ROUNDS;

const QUESTION = 'What is the result of the expression?';

function calculate(string $symbol, int $randNumber1, int $randNumber2): int
{
    switch ($symbol) {
        case "+":
            return $randNumber1 + $randNumber2;
        case "-":
            return $randNumber1 - $randNumber2;
        case "*":
            return $randNumber1 * $randNumber2;
        case "/":
            return $randNumber1 / $randNumber2;
        default:
            return null;
    }
}

function startCalculator()
{
    $mathQuestion = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $randNumber1 = rand(1, 30);
        $randNumber2 = rand(1, 30);
        $symbols = ['+', '-', '*'];
        $symbol = $symbols[array_rand($symbols)];
        $question = "{$randNumber1} {$symbol} {$randNumber2}";
        $rightAnswer = (string)(calculate($symbol, $randNumber1, $randNumber2));
        $mathQuestion[$i] = ['question' => $question, 'right answer' => $rightAnswer];
    }

    play($mathQuestion, QUESTION);
}
