<?php
namespace Utils;

class Counter
{
    public static function calculate($words, $separator=" ")
    {
        return count(
            explode(
                $separator,
                $words
            )
        );
    }
}
