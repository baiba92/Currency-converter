<?php

use GuzzleHttp\Client;

class APIConnector
{
    private Client $client;
    private string $apiKey = '8c79142f660b68e2cf85dcffc6dd90fc';
    private string $city;
    private string $countryCode;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCountries(): array
    {
        $countriesUrl = "http://country.io/names.json";
        $countryResponse = $this->client->get($countriesUrl);
        return (array)json_decode($countryResponse->getBody());
    }

    public function getCityData(string $city, string $countryCode)
    {
        $this->city = $city;
        $this->countryCode = $countryCode;

        $cityUrl = "http://api.openweathermap.org/geo/1.0/direct?q=$this->city,$this->countryCode&limit=1&appid=$this->apiKey";
        $cityResponse = $this->client->get($cityUrl);
        return json_decode($cityResponse->getBody());
    }

    public function getWeatherData()
    {
        $lat = $this->getCityData($this->city, $this->countryCode)[0]->lat;
        $lon = $this->getCityData($this->city, $this->countryCode)[0]->lon;

        $weatherUrl = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$this->apiKey&units=metric";
        $weatherResponse = $this->client->get($weatherUrl);
        return json_decode($weatherResponse->getBody());
    }
}