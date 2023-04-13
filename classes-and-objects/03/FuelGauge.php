<?php

class FuelGauge
{
    private float $liters;

    public function __construct(float $liters = 0)
    {
        $this->liters = $liters;
    }

    public function getLiters(): float
    {
        return $this->liters;
    }

    public function increment(int $amount): void
    {
        $this->liters += $amount;
    }

    public function decrement(float $amount): void
    {
        if ($this->liters > 0) {
            $this->liters -= $amount;
        }
    }
}