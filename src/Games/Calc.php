<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\runEngine;

const GAME_DESCRIPTION = 'What is the result of the expression?';


function run(): void
{
    $getQuestionValue = function () {
        $operators = ['+', '*', '-'];

        $int1 = rand(1, 50);
        $int2 = rand(1, 50);
        $key = array_rand($operators);
        $operator = $operators[$key];

        return "$int1 $operator $int2";
    };

    $getAnswer = function ($expression) {
        $exprParts = explode(" ", $expression);
        $num1 = (int)$exprParts[0];
        $num2 = (int)$exprParts[2];
        $operator = $exprParts[1];

        $result = 0;

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            default:
                print_r("Unsupported operator!");
                break;
        }
        return (string)$result;
    };

    runEngine(GAME_DESCRIPTION, $getQuestionValue, $getAnswer);
}
