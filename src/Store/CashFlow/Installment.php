<?php

namespace App\Store\CashFlow;

use ArrayObject;

class Installment
{
    private string $client;
    private float $value;
    private ArrayObject $payments;
    private bool $isPaid = false;

    public function __construct(string $client, float $value)
    {
        $this->client = $client;
        $this->value = $value;
        $this->payments = new ArrayObject();
    }

    public function addPayment(Payment $payment): void
    {
        $this->payments->append($payment);

        $totalValue = 0;

        foreach ($this->payments as $payment) {
            $totalValue += $payment->getValue();
        }

        if ($totalValue >= $this->value) {
            $this->isPaid = true;
        }
    }

    public function setPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }

    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getPayments(): ArrayObject
    {
        return $this->payments;
    }
}
