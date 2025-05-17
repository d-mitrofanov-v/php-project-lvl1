<?php

namespace Hexlet\Code;

use function cli\line;
use function cli\prompt;

function runEngine(string $gameDescription, callable $getQuestionValue, callable $getAnswer): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);

    $maxNumOfRounds = 3;

    for ($i = 0; $i < $maxNumOfRounds; $i++) {
        line($gameDescription);
        $questionValue = $getQuestionValue();
        $userAnswer = prompt("Question: {$questionValue}");
        $correctAnswer = $getAnswer($questionValue);

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, {$name}!");
}
