<?php

class FuelGauge
{
    private int $fuelAmount;

    public function __construct(int $fuelAmount = 0)
    {
        $this->fuelAmount = $fuelAmount;
    }

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function addFuel()
    {
        $this->fuelAmount++;
    }

    public function burnFuel()
    {
        if ($this->fuelAmount > 0) {
            $this->fuelAmount--;
        }
    }
}