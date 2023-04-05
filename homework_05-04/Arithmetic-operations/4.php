<?php

// Write a program to compute the product of integers from 1 to 10
// (i.e., 1×2×3×...×10), as an int. Take note that it is the same as factorial of N.

$firstNumber = 1;
$lastNumber = 10;
function product(int $first, int $last): int
{
    return array_product(range($first, $last));
}

echo product($firstNumber, $lastNumber);