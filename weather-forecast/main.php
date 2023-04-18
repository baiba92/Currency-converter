<?php declare(strict_types=1);

require "vendor/autoload.php";

use WeatherForecast\ApiConnector;

echo 'KNOW - THE - WEATHER' . "\n";
echo '--------------------' . "\n";

$apiConnector = new ApiConnector();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$input = readline('Enter city and country (e.g. Riga, Latvia): ');
$cityAndCountry = explode(', ', $input);

$city = $cityAndCountry[0];
$country = $cityAndCountry[1];
$countryCode = array_search($country, $apiConnector->getCountries());
$formattedCity = preg_replace('/\s/', '-', $cityAndCountry[0]);

$forecast = $apiConnector->getWeatherData($formattedCity, $countryCode);

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