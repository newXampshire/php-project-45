<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\bye;
use function BrainGames\Cli\hello;
use function BrainGames\Cli\nbOfAttempts;
use function BrainGames\Cli\processError;
use function BrainGames\Cli\processSuccess;
use function cli\line;
use function cli\prompt;

function calcGame(): void
{
    hello();

    line('What is the result of the expression?');

    $attempts = 0;
    while ($attempts < nbOfAttempts()) {
        [$expression, $expectedAnswer] = getData();

        $answer = prompt("Question: $expression");
        line("Your answer: %s", $answer);

        if ($answer !== $expectedAnswer) {
            processError($answer, $expectedAnswer);

            return;
        }

        processSuccess();
        $attempts++;
    }

    bye();
}

function getData(): array
{
    $result = 0;

    $a = rand(1, 100);
    $b = rand(1, 100);

    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
    }

    return [
        "$a $operator $b",
        (string)$result
    ];
}
