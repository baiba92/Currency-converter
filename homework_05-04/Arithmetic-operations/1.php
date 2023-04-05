<?php

// Write a program to accept two integers and return true if the either
// is 15 or if their sum or difference is 15.

function isFifteen(int $first, int $second): bool
{
    if ($first === 15 ||
        $second === 15 ||
        $first + $second === 15 ||
        $first - $second === 15 ||
        $second - $first === 15) {
        return true;
    } else {
        return false;
    }
}

var_dump(isFifteen(15, 0));
var_dump(isFifteen(3, 7));
var_dump(isFifteen(9, 24));