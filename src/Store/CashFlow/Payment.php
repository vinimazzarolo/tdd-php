<?php

namespace App\Store\CashFlow;

class Payment
{
    public function __construct(
        private float $value,
        private $paymentMethod
    )
    { }

    public function getValue(): float
    {
        return $this->value;
    }
}
