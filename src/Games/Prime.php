<?php

namespace Hexlet\Code\Games\Prime;

use function Hexlet\Code\runEngine;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $getQuestionValue = function () {
        return random_int(1, 50);
    };

    $getAnswer = function ($num) {
        return isPrime($num) ? 'yes' : 'no';
    };

    runEngine(GAME_DESCRIPTION, $getQuestionValue, $getAnswer);
}
