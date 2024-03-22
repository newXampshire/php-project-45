<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function runGame(callable $game, string $rules): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    line($rules);

    $attempts = 0;
    while ($attempts < 3) {
        [$question, $expectedAnswer] = $game();

        $answer = prompt("Question: $question");
        line("Your answer: %s", $answer);

        if ($answer !== $expectedAnswer) {
            processError($name, $answer, $expectedAnswer);

            return;
        }

        processSuccess();
        $attempts++;
    }

    line("Congratulations, $name!");
}

function processSuccess(): void
{
    line('Correct!');
}

function processError(string $name, string $answer, string $expectedAnswer): void
{
    line("'$answer' is wrong answer ;(. Correct answer was '$expectedAnswer'");
    line("Let's try again, $name!");
}
