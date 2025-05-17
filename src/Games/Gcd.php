<?php

namespace Hexlet\Code\Games\GCD;

use function Hexlet\Code\runEngine;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGCD(int $a, int $b): int
{
    while ($b !== 0) {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }
    return $a;
}

function run(): void
{
    $getQuestionValue = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        return "$num1 $num2";
    };

    $getAnswer = function ($numbers) {
        $nums = explode(" ", $numbers);
        $num1 = (int)$nums[0];
        $num2 = (int)$nums[1];
        return strval(getGCD($num1, $num2));
    };

    runEngine(GAME_DESCRIPTION, $getQuestionValue, $getAnswer);
}
