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

function primeGame(): void
{
    hello();

    line('Answer "yes" if given number is prime. Otherwise answer "no"');

    $attempts = 0;
    while ($attempts < nbOfAttempts()) {
        $number = rand(1, 100);
        $expectedAnswer = isPrimeNumber($number) ? 'yes' : 'no';

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

function isPrimeNumber(int $n): bool
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}
