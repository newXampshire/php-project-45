<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\runGame;

function progressionGame(): void
{
    runGame(
        game: function (): array {
            return getProgressionData();
        },
        rules: 'What number is missing in the progression?'
    );
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
