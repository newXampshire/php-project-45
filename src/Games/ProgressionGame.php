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

function progressionGame(): void
{
    hello();

    line('What number is missing in the progression?');

    $attempts = 0;
    while ($attempts < nbOfAttempts()) {
        [$progression, $expectedAnswer] = getProgressionData();

        $answer = prompt("Question: $progression");
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

function getProgressionData(): array
{
    $step = rand(1, 4);

    $progression = [];
    for ($i = 0, $a = rand(1, 10); $i < 10; $i++, $a += $step) {
        $progression[] = $a;
    }

    $randKey = array_rand($progression);

    $answer = $progression[$randKey];
    $progression[$randKey] = '..';

    return [
        implode(' ', $progression),
        (string)$answer
    ];
}
