<?php
/*
 * Write a program that picks a random number from 1-100. Give the user a chance to guess it.
 *  If they get it right, tell them so. If their guess is higher than the number, say "Too high."
 *  If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)
 *
 *  I'm thinking of a number between 1-100.  Try to guess it.
 *  > 13
 *
 *  Sorry, you are too low.  I was thinking of 34.
 */

$randomNumber = mt_rand(1, 100);
echo "I'm thinking of a number between 1-100. Try to guess it.\n";
$guess = (int)readline('> ');

if ($guess < $randomNumber) {
    echo "Too low, I was thinking of $randomNumber.";
} elseif ($guess > $randomNumber) {
    echo "Too high, I was thinking of $randomNumber.";
} else {
    echo "You guessed! It really was $guess.";
}