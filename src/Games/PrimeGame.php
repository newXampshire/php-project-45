<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\runGame;

function primeGame(): void
{
    runGame(
        game: function (): array {
            $number = rand(1, 100);
            $expectedAnswer = isPrimeNumber($number) ? 'yes' : 'no';

            return [$number, $expectedAnswer];
        },
        rules: 'Answer "yes" if given number is prime. Otherwise answer "no".'
    );
}

function isPrimeNumber(int $n): bool
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}
