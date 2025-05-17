<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\runEngine;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function run(): void
{
    $getQuestionValue = function () {
        return random_int(1, 50);
    };

    $getAnswer = function ($num) {
        return isEven($num) ? 'yes' : 'no';
    };

    runEngine(GAME_DESCRIPTION, $getQuestionValue, $getAnswer);
}
