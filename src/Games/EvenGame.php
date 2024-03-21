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

function evenGame(): void
{
    hello();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $attempts = 0;
    while ($attempts < nbOfAttempts()) {
        $number = rand(1, 100);
        $expectedAnswer = $number % 2 === 0 ? 'yes' : 'no';

        $answer = prompt("Question: $number");
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
