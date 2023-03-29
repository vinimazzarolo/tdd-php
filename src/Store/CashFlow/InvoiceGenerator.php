<?php

namespace App\Store\CashFlow;

use DateTime;

class InvoiceGenerator
{
    public function __construct(private $dao, private $sap)
    {
    }

    public function generate(Order $order): ?Invoice
    {
        $invoice = new Invoice(
            $order->getClient(),
            $order->getTotalPrice() * 0.94,
            new DateTime()
        );

        $invoiceDao = new InvoiceDao();
        if ($invoiceDao->persist($invoice) && $this->sap->send($invoice)) {
            return $invoice;
        }

        return null;
    }
}
