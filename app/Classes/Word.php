<?php


namespace App\Classes;


class Word
{
    public static function trim($word): string
    {
        $firstStep = ltrim($word, "'(");
        $secondStep = rtrim($firstStep, ":?,.'™!)");
        return $secondStep;
    }
}
