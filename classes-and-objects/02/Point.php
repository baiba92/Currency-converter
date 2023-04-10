<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point &$a, Point &$b)
    {
        $c = $a;
        $a = $b;
        $b = $c;
    }
}