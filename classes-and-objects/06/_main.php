<?php

$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

function calculateEnergyDrinkers(int $numberSurveyed, float $percentPurchasedDrink): float
{
    return $numberSurveyed * $percentPurchasedDrink;
}

$energyDrinkers = calculateEnergyDrinkers($surveyed, $purchasedEnergyDrinks);

function calculatePreferCitrus(float $purchasedDrink, float $percentPreferCitrus): float
{
    return $purchasedDrink * $percentPreferCitrus;
}

$citrusDrinkers = calculatePreferCitrus($energyDrinkers, $preferCitrusDrinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . floor($energyDrinkers) . " bought at least one energy drink." . PHP_EOL;
echo floor($citrusDrinkers) . " of those prefer citrus flavored energy drinks." . PHP_EOL;