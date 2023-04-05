<?php

$number = (int)readline("Enter the number: ");

// Print if number is positive or negative

if ($number === 0) {
    echo 'zero';
} elseif ($number > 0) {
    echo 'positive';
} else {
    echo 'negative';
}