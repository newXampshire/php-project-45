<?php

declare(strict_types=1);

namespace BrainGames\Games\Cli;

use function BrainGames\Cli\runGame;

function evenGame(): void
{
    runGame(
        game: function (): array {
            $number = rand(1, 100);
            $expectedAnswer = $number % 2 === 0 ? 'yes' : 'no';

            return [$number, $expectedAnswer];
        },
        rules: 'Answer "yes" if the number is even, otherwise answer "no".'
    );
}
