<?php

class Car
{
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private int $fuelTankSize = 70;
    private const LITERS_PER_HUNDRED = 10;

    public function __construct(FuelGauge $fuelGauge, Odometer $odometer)
    {
        $this->fuelGauge = $fuelGauge;
        $this->odometer = $odometer;
    }

    public function addFuel(int $amount): void
    {
        if (($this->fuelAmount() + $amount) <= $this->fuelTankSize) {
            $this->fuelGauge->increment($amount);
            return;
        }
        echo 'Fuel tank capacity is 70 liters.';
    }

    public function burnFuel(): void
    {
        $this->fuelGauge->decrement(self::LITERS_PER_HUNDRED / 100);
    }

    public function drive(): void
    {
        $this->odometer->increment();
        $this->burnFuel();
    }

    public function fuelAmount(): float
    {
        return $this->fuelGauge->getLiters();
    }

    public function currentMileage(): int
    {
        return $this->odometer->getMileage();
    }
}