<?php

/*
 * On your phone keypad, the alphabets are mapped to digits as follows:
 * ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).
 * Write a program called PhoneKeyPad, which prompts user for a String (case insensitive),
 * and converts to a sequence of keypad digits.
 *
 * Use:
 * a "nested-if" statement
 * a "switch-case-default" statement
 * Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,
 */

function phoneKeyPad(string $string): void
{
    $keyPad = [
        addKey(2, 'ABC'),
        addKey(3, 'DEF'),
        addKey(4, 'GHI'),
        addKey(5, 'JKL'),
        addKey(6, 'MNO'),
        addKey(7, 'PQRS'),
        addKey(8, 'TUV'),
        addKey(9, 'WXYZ'),
    ];

    $string = str_split(strtoupper($string));
    foreach ($string as $character) {
        $output = "";
        for ($i = 0; $i < count($keyPad); $i++) {
            $times = strpos($keyPad[$i]->letters, $character) + 1;
            if (in_array($character, str_split($keyPad[$i]->letters))) {
                $output .= str_repeat($keyPad[$i]->digit, $times);
            }
        }
        //$output .= "."; // use dot to divide sequence of same digit, but different characters
        echo $output;
    }
}

phoneKeyPad('KeyPad');

function addKey(int $digit, string $letters): stdClass
{
    $key = new stdClass();
    $key->digit = $digit;
    $key->letters = $letters;
    return $key;
}