<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\runGame;

function gcdGame(): void
{
    runGame(
        game: function (): array {
            $a = rand(1, 100);
            $b = rand(1, 100);

            $expectedAnswer = (string)getGcd($a, $b);

            return ["$a $b", $expectedAnswer];
        },
        rules: 'Find the greatest common divisor of given numbers.'
    );
}

function getGcd(int $a, int $b): int
{
    while ($a !== $b) {
        $a > $b ? $a = $a - $b : $b = $b - $a;
    }

    return $a;
}
