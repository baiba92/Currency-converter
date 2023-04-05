<?php

/*
 * Write a program that calculates and displays a person's body mass index (BMI). A person's BMI is calculated
 * with the following formula: BMI = weight x 703 / height ^ 2. Where weight is measured in pounds
 * and height is measured in inches. Display a message indicating whether the person has optimal weight,
 * is underweight, or is overweight. A sedentary person's weight is considered optimal if his or her BMI
 * is between 18.5 and 25. If the BMI is less than 18.5, the person is considered underweight.
 * If the BMI value is greater than 25, the person is considered overweight.
 * Your program must accept metric units.
 */

function calculateBMI(float $weight, float $height): void
{
    $BMI = $weight / $height ** 2;
    if ($BMI < 18.5) {
        echo "With BMI $BMI you are considered underweight.";
    } elseif ($BMI >= 18.5 && $BMI <= 25) {
        echo "With BMI $BMI your weight is considered optimal.";
    } elseif ($BMI > 25) {
        echo "With BMI $BMI you are considered overweight.";
    }
}

calculateBMI(56, 1.70);
echo "\n";
calculateBMI(105, 1.80);
echo "\n";
calculateBMI(69, 1.95);