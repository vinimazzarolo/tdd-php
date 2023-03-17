<?php

namespace App\Store\Produtct;

class Product
{
    public function __construct(
        private string $name,
        private float $price,
        private int $quantity = 1
    )
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotalPrice(): float
    {
        return $this->price * $this->quantity;
    }
}