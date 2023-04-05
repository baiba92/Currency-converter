<?php

// Write a program that reads a positive integer and count the number of digits the number has.

function countDigits(int $number): int
{
    return strlen($number);
}

var_dump(countDigits(23456));