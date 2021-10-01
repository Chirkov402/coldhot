<?php

namespace Chirkov402\cold_hot\Controller;

use function Chirkov402\cold_hot\View\showGame;
use function Chirkov402\cold_hot\View\showList;
use function Chirkov402\cold_hot\View\showReplay;
use function Chirkov402\cold_hot\View\help;

function menu()
{
    $key = readline("Введите ключ: ");
    if ($key == "--new") {
        startGame();
    } elseif ($key == "--list") {
        showList();
    } elseif ($key == "--replay") {
        showReplay();
    } elseif ($key == "--help") {
        help();
    } else {
        echo "Не верный ключ.\n";
        menu();
    }
}

function coldHot($numberArray, $currentNumber)
{
    for ($i = 0; $i < 3; $i++) {
        if ($numberArray[$i] == $currentNumber[$i]) {
            echo "Горячо!\n";
        } elseif (
            $numberArray[$i] == $currentNumber[0] ||
            $numberArray[$i] == $currentNumber[1] ||
            $numberArray[$i] == $currentNumber[2]
        ) {
            echo "Тепло!\n";
        } else {
            echo "Холодно!\n";
        }
    }
}

function restart()
{
    $restart = readline("Хотите сыграть ещё?[Y/N]\n");
    if ($restart == "Y") {
        startGame();
    } else {
        exit;
    }
}

function startGame()
{
    showGame();
    $number = 0;
    $currentNumber = random_int(100, 999);
    $currentNumber = str_split($currentNumber);
    while ($number != $currentNumber) {
        $number = readline("Введите трехзначное число : ");
        if (is_numeric($number)) {
            if (strlen($number) != 3) {
                echo "Ошибка! Число должно быть трехзначным\n";
            } else {
                $numberArray = str_split($number);
                if ($numberArray == $currentNumber) {
                    echo "Вы выиграли!\n";
                    restart();
                } else {
                    coldHot($numberArray, $currentNumber);
                }
            }
        } else {
            echo "Ошибка! Введите число.\n";
        }
    }
}
