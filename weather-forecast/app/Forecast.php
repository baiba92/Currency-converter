<?php declare(strict_types=1);

namespace WeatherForecast;

use stdClass;

class Forecast
{
    private stdClass $weatherData;

    public function __construct(stdClass $weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function getDescription(): string
    {
        return $this->weatherData->weather[0]->description;
    }

    public function getTemperature(): float
    {
        return $this->weatherData->main->temp;
    }

    public function getTemperatureFeelsLike(): float
    {
        return $this->weatherData->main->feels_like;
    }

    public function getWindSpeed(): float
    {
        return $this->weatherData->wind->speed;
    }

    public function getWindDirection(): string
    {
        $direction = [
            'N', 'N/NE', 'NE', 'E/NE',
            'E', 'E/SE', 'SE', 'S/SE',
            'S', 'S/SW', 'SW', 'W/SW',
            'W', 'W/NW', 'NW', 'N/NW', 'N'
        ];
        return $direction[round($this->weatherData->wind->deg * 16 / 360)];
    }

    public function getClouds(): int
    {
        return $this->weatherData->clouds->all;
    }

    public function getHumidity(): int
    {
        return $this->weatherData->main->humidity;
    }

    public function getPrecipitation(): ?float
    {
        if (property_exists($this->weatherData, 'rain')) {
            return get_object_vars($this->weatherData->rain)["1h"];
        } elseif (property_exists($this->weatherData, 'snow')) {
            return get_object_vars($this->weatherData->snow)["1h"];
        }
        return null;
    }

    public function getDateAndTime(): string
    {
        return gmdate("d-m-Y H:i:s", time() + date((string)$this->weatherData->timezone));
    }
}