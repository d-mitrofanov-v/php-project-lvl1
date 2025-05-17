<?php

namespace Hexlet\Code\Games\Progression;

use function Hexlet\Code\runEngine;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function run(): void
{
    $getQuestionValue = function () {
        $num1 = random_int(1, 50);
        $progressionLen = random_int(5, 11);
        $progressionStep = random_int(1, 20);
        $indexToHide = random_int(0, $progressionLen - 1);
        $progression = [$num1];

        for ($i = 0; $i < $progressionLen; $i++) {
            $lastItem = $progression[count($progression) - 1];
            $progression[] = $lastItem + $progressionStep;
        }

        $progression[$indexToHide] = "..";
        return implode(" ", $progression);
    };

    $getAnswer = function ($progression) {
        $numbers = explode(" ", $progression);
        $hiddenIndex = (int)array_search("..", $numbers, true);
        if ($hiddenIndex < 2) {
            $num1 = (int)$numbers[$hiddenIndex + 2];
            $num2 = (int)$numbers[$hiddenIndex + 1];
        } else {
            $num1 = (int)$numbers[$hiddenIndex - 1];
            $num2 = (int)$numbers[$hiddenIndex - 2];
        }
        $step = $num1 - $num2;
        $answer = (int)$numbers[$hiddenIndex + 1] - $step;
        return (string)$answer;
    };

    runEngine(GAME_DESCRIPTION, $getQuestionValue, $getAnswer);
}
