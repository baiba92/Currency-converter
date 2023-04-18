<?php declare(strict_types=1);

namespace WeatherForecast;

use GuzzleHttp\Client;

class ApiConnector
{
    private Client $client;


    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCountries(): array
    {
        $countriesUrl = "http://country.io/names.json";
        $countryResponse = $this->client->get($countriesUrl);
        return (array)json_decode($countryResponse->getBody()->getContents());
    }

    public function getWeatherData(string $city, string $countryCode): Forecast
    {
        $cityUrl = "http://api.openweathermap.org/geo/1.0/direct?q=$city,$countryCode&limit=1&appid={$_ENV['API_KEY']}";
        $cityResponse = $this->client->get($cityUrl);
        $cityData = json_decode($cityResponse->getBody()->getContents());

        $lat = $cityData[0]->lat;
        $lon = $cityData[0]->lon;

        $weatherUrl = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid={$_ENV['API_KEY']}&units=metric";
        $weatherResponse = $this->client->get($weatherUrl);
        $weatherData = json_decode($weatherResponse->getBody()->getContents());

        return new Forecast($weatherData);
    }
}