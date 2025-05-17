<?php

namespace Hexlet\Code;

use function cli\line;
use function cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function getCorrectAnswer($num)
{
    return isEven($num) ? 'yes' : 'no';
}

function isCorrectAnswer($userAnwser, $correctAnswer)
{
    $acceptedAnswers = ['yes', 'no'];

    if (!in_array($userAnwser, $acceptedAnswers)) {
        return false;
    }
    return $userAnwser === $correctAnswer;
}

function playEven($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $counter = 0;

    while (true) {
        if ($counter === 3) {
            line("Congratulations, {$name}!");
            return;
        }

        $number = random_int(1, 50);
        line("Question: {$number}");
        $userAnwser = prompt("Your answer: ");
        $correctAnswer = getCorrectAnswer($number);

        if (!isCorrectAnswer($userAnwser, $correctAnswer)) {
            line("'{$userAnwser}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        $counter += 1;
        line("Correct!");
    }
}
