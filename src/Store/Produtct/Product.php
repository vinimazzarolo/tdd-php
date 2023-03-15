<?php

namespace App\Store\Produtct;

class Product
{
    public function __construct(
        public string $name,
        public float $price
    )
    {

    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}