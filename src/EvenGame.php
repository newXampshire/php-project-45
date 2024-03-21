<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function evenGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $attempts = 0;
    while ($attempts < 3) {
        $number = rand(1, 100);
        $expectedAnswer = $number % 2 === 0 ? 'yes' : 'no';

        $answer = prompt("Question: $number");
        line("Your answer: %s", $answer);

        if ($answer !== $expectedAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$expectedAnswer'");
            line("Let's try again, $name!");

            return;
        }

        line('Correct!');
        $attempts++;
    }

    line("Congratulations, $name!");
}
