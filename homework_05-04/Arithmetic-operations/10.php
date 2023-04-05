<?php

/*
 * Design a Geometry class with the following methods:
 * A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
 * Area = π * r * 2
 * Use Math.PI for π and r for the radius of the circle
 * A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
 * Use the following formula:
 * Area = Length x Width
 * A static method that accepts the length of a triangle’s base and the triangle’s height.
 * The method should return the area of the triangle. Use the following formula:
 * Area = Base x Height x 0.5
 * The methods should display an error message if negative values are used for the circle’s radius,
 * the rectangle’s length or width, or the triangle’s base or height.
 *
 * Next write a program to test the class, which displays the following menu and responds to the user’s selection:
 *
 * Geometry calculator:
 * Calculate the Area of a Circle
 * Calculate the Area of a Rectangle
 * Calculate the Area of a Triangle
 * Quit
 * Enter your choice (1-4):
 *
 * Display an error message if the user enters a number outside the range of 1 through 4
 * when selecting an item from the menu.
 */

class Geometry
{
    public static function getCircleArea(float $radius): float
    {
        if ($radius <= 0) {
            return "Error, radius must be positive number";
        }
        return M_PI * $radius * 2;
    }

    public static function getRectangleArea(float $length, float $width): float
    {
        if ($length <= 0 || $width <= 0) {
            return "Error, length and width must be positive numbers";
        }
        return $length * $width;
    }

    public static function getTriangleArea(float $base, float $height): float
    {
        if ($base <= 0 || $height <= 0) {
            return "Error, base and height must be positive numbers";
        }
        return $base * $height * 0.5;
    }
}

echo 'Geometry calculator:', "\n";
echo '1  Calculate the Area of a Circle', "\n";
echo '2  Calculate the Area of a Rectangle', "\n";
echo '3  Calculate the Area of a Triangle', "\n";
echo '4  Quit', "\n";
echo 'Enter your choice (1-4):', "\n";

$selection = null;
while (!in_array($selection, range(1, 4))) {
    $selection = readline('>> ');
    echo "Valid choice number is 1-4, try again\n";
}

if ($selection === '1') {
    $selectedRadius = readline('Enter radius: ');
    echo Geometry::getCircleArea($selectedRadius);
} elseif ($selection === '2') {
    $selectedLength = readline('Enter length: ');
    $selectedWidth = readline('Enter width: ');
    echo Geometry::getRectangleArea($selectedLength, $selectedWidth);
} elseif ($selection === '3') {
    $selectedBase = readline('Enter base: ');
    $selectedHeight = readline('Enter height: ');
    echo Geometry::getTriangleArea($selectedBase, $selectedHeight);
} elseif ($selection === '4') {
    exit;
}