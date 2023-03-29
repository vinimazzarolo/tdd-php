<?php

namespace App\Store\CashFlow;

use DateTime;

class Invoice
{
    public function __construct(
        private string $client,
        private float $price,
        private DateTime $date
    )
    { }

    public function getClient(): string
    {
        return $this->client;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getData(): DateTime
    {
        return $this->date;
    }
}
