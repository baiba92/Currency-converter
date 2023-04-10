<?php

class Car
{
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private int $fuelTankSize = 70;
    private int $fuelEconomy = 10;
    private int $distanceTraveled = 0;

    public function __construct(FuelGauge $fuelGauge, Odometer $odometer)
    {
        $this->fuelGauge = $fuelGauge;
        $this->odometer = $odometer;
    }

    public function fillTank(int $amount)
    {
        while ($this->fuelGauge->getFuelAmount() < $this->fuelTankSize
            && $this->fuelGauge->getFuelAmount() <= $amount) {
            $this->fuelGauge->addFuel();
        }
    }

    public function burnFuelByDistanceTraveled()
    {
        if ($this->distanceTraveled % $this->fuelEconomy === 0) {
            $this->fuelGauge->burnFuel();
        }
    }

    public function drive()
    {
        $this->odometer->addMileage();
        $this->burnFuelByDistanceTraveled();
        $this->distanceTraveled++;
    }

    public function getFuelGauge(): FuelGauge
    {
        return $this->fuelGauge;
    }

    public function getOdometer(): Odometer
    {
        return $this->odometer;
    }
}