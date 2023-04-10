<?php

include 'Car.php';
include 'FuelGauge.php';
include 'Odometer.php';

$car = new Car(new FuelGauge(), new Odometer(999980));
$car->fillTank(20);

while ($car->getFuelGauge()->getFuelAmount() > 0) {
    $car->drive();
    echo 'Mileage: ' . $car->getOdometer()->getMileage() . PHP_EOL;
    echo 'Fuel amount: ' . $car->getFuelGauge()->getFuelAmount() . PHP_EOL;
}
