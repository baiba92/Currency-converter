<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $percentPurchasedDrink): float
{
    return $numberSurveyed * $percentPurchasedDrink;
}

$energyDrinkers = calculate_energy_drinkers($surveyed, $purchased_energy_drinks);

function calculate_prefer_citrus(float $purchasedDrink, float $percentPreferCitrus): float
{
    return $purchasedDrink * $percentPreferCitrus;
}

$citrusDrinkers = calculate_prefer_citrus($energyDrinkers, $prefer_citrus_drinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . floor($energyDrinkers) . " bought at least one energy drink." . PHP_EOL;
echo floor($citrusDrinkers) . " of those prefer citrus flavored energy drinks." . PHP_EOL;