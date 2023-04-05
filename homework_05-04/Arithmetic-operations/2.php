<?php

// Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

function CheckOddEven(int $number): void
{
    echo $number % 2 === 0 ? 'Even Number' : 'Odd Number';
    echo "\n" . 'bye!';
}

CheckOddEven(5);
echo "\n";
CheckOddEven(12);