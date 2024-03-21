<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function hello(): void
{
    global $name;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
}

function bye(): void
{
    global $name;

    line("Congratulations, $name!");
}

function nbOfAttempts(): int
{
    return 3;
}

function processSuccess(): void
{
    line('Correct!');
}

function processError(string $answer, string $expectedAnswer): void
{
    global $name;

    line("'$answer' is wrong answer ;(. Correct answer was '$expectedAnswer'");
    line("Let's try again, $name!");
}
