<?php

namespace App\Store\CashFlow;

class Ticket
{
    public function __construct(private float $value)
    {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
