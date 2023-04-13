<?php

class Odometer
{
    private int $mileage;
    private int $maximumMileage = 999999;

    public function __construct(float $mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function increment(): void
    {
        if ($this->mileage <= $this->maximumMileage) {
            $this->mileage++;
        }
        if ($this->mileage === $this->maximumMileage + 1) {
            $this->mileage = 0;
        }
    }
}