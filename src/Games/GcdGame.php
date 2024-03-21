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

function gcdGame(): void
{
    hello();

    line('Find the greatest common divisor of given numbers.');

    $attempts = 0;
    while ($attempts < nbOfAttempts()) {
        $a = rand(1, 100);
        $b = rand(1, 100);

        $expectedAnswer = (string)getGcd($a, $b);

        $answer = prompt("Question: $a $b");
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

function getGcd(int $a, int $b): int
{
    while ($a !== $b) {
        $a > $b ? $a = $a - $b : $b = $b - $a;
    }

    return $a;
}
