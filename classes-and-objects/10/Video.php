<?php

class Video
{
    private string $title;
    private bool $available = true;
    private array $rates = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function rate(int $rate): void
    {
        $this->rates[] = $rate;
    }

    public function getAverageRate(): float
    {
        if (count($this->rates) <= 0) {
            return 0;
        }
        return array_sum($this->rates) / count($this->rates);
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}