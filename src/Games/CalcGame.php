<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\runGame;

function calcGame(): void
{
    runGame(
        game: function (): array {
            return getExpressionData();
        },
        rules: 'What is the result of the expression?'
    );
}

function getExpressionData(): array
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
