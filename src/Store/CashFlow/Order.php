<?php

namespace App\Store\CashFlow;

class Order
{
    public function __construct(
        private string $client,
        private float $totalPrice,
        private int $itensQuantity
    ) { }

    public function getClient(): string
    {
        return $this->client;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function getItensQuantity(): int
    {
        return $this->itensQuantity;
    }
}
