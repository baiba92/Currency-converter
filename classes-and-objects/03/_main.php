<?php

include 'Car.php';
include 'FuelGauge.php';
include 'Odometer.php';

$car = new Car(new FuelGauge(), new Odometer(999980));
$car->addFuel(70);

while ($car->fuelAmount() > 0) {
    $car->drive();
    sleep(1);
    echo 'Mileage: ' . $car->currentMileage() . PHP_EOL;
    echo 'Fuel amount: ' . $car->fuelAmount() . PHP_EOL;
}
