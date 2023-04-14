<?php

require "vendor/autoload.php";
require "APIConnector.php";
require "Forecast.php";

echo 'KNOW - THE - WEATHER' . "\n";
echo '--------------------' . "\n";

$connection = new APIConnector();

$input = readline('Enter city and country (e.g. Riga, Latvia): ');
$cityAndCountry = explode(', ', $input);

$city = $cityAndCountry[0];
$country = $cityAndCountry[1];
$countryCode = array_search($country, $connection->getCountries());
$formattedCity = preg_replace('/\s/', '-', $cityAndCountry[0]);

$connection->getCityData($formattedCity, $countryCode);
$forecast = new Forecast($connection->getWeatherData());

echo "\n";
echo "Weather in $city, $country ($countryCode):" . "\n";

echo "Description: {$forecast->getDescription()}\n";
echo "Temperature: {$forecast->getTemperature()} °C\n";
echo "Temperature (feels-like): {$forecast->getTemperatureFeelsLike()} °C\n";
echo "Wind: {$forecast->getWindSpeed()} m/s, {$forecast->getWindDirection()}\n";
echo "Clouds: {$forecast->getClouds()} %\n";
echo "Humidity: {$forecast->getHumidity()} %\n";
echo $forecast->getPrecipitation() ? "Precipitation: {$forecast->getPrecipitation()}\n" : null;
echo "Date, time: {$forecast->getDateAndTime()}\n";