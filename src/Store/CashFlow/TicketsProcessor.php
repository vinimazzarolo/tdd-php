<?php

namespace App\Store\CashFlow;

use ArrayObject;

class TicketsProcessor
{
    public function process(ArrayObject $tickets, Installment $installment): void
    {
        $totalValue = 0;

        $installmentsPayment = $installment->getPayments();
        foreach ($tickets as $ticket) {
            $payment = new Payment($ticket->getValue(), PaymentMethod::TICKET);
            $installmentsPayment->append($payment);
            $totalValue += $ticket->getValue();
        }

        if ($totalValue >= $installment->getValue()) {
            $installment->setPaid(true);
        }
    }
}
