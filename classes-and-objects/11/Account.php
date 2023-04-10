<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function balance(): float
    {
        return number_format($this->balance);
    }

    public function withdrawal(float $amount)
    {
        $this->balance -= $amount;
    }

    public function deposit(float $amount)
    {
        $this->balance += $amount;
    }

    public function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }
}