<?php

// Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable
// "dayNumber" is 0, 1, ..., 6, respectively. Otherwise, it shall print "Not a valid day".
//
// Use:
// a "nested-if" statement
// a "switch-case-default" statement.

function getWeekday(int $dayNumber): void
{
    switch ($dayNumber) {
        case 1:
            echo 'Monday';
            break;
        case 2:
            echo 'Tuesday';
            break;
        case 3:
            echo 'Wednesday';
            break;
        case 4:
            echo 'Thursday';
            break;
        case 5:
            echo 'Friday';
            break;
        case 6:
            echo 'Saturday';
            break;
        case 7:
            echo 'Sunday';
            break;
        default:
            echo 'Not a valid day';
    }
}

getWeekday(15);