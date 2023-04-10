<?php

class Date
{
    private string $day;
    private string $month;
    private string $year;

    public function __construct(string $day, string $month, string $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        } else {
            echo 'NOT A VALID DATE' . PHP_EOL;
        }
    }

    public function setDay(string $day): void
    {
        if (checkdate($this->month, $day, $this->year)) {
            $this->day = $day;
        } else {
            echo 'NOT A VALID DATE' . PHP_EOL;
        }
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function setMonth(string $month): void
    {
        if (checkdate($month, $this->day, $this->year)) {
            $this->month = $month;
        } else {
            echo 'NOT A VALID DATE' . PHP_EOL;
        }
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function setYear(string $year): void
    {
        if (checkdate($this->month, $this->day, $year)) {
            $this->year = $year;
        } else {
            echo 'NOT A VALID DATE' . PHP_EOL;
        }
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        return $this->day . ' / ' . $this->month . ' / ' . $this->year;
    }
}