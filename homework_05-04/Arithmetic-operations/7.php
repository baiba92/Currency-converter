<?php

// Modify the example program to compute the position of an object after falling for 10 seconds,
// outputting the position in meters. The formula in Math notation is:

function fallingPosition(int $time): float
{
    $acceleration = -9.81;
    return 0.5 * $acceleration * $time * $time;
}

echo fallingPosition(10);