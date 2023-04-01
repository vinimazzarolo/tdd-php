<?php

namespace Tests\Store\CashFlow;

use App\Store\CashFlow\Installment;
use App\Store\CashFlow\Ticket;
use App\Store\CashFlow\TicketsProcessor;
use ArrayObject;
use PHPUnit\Framework\TestCase;

class TicketsTest extends TestCase
{
    public function testShouldProcessSingleTicketPayment()
    {
        $ticketsProcessor = new TicketsProcessor();

        $installment = new Installment('Vini', 150.0);
        $ticket = new Ticket(150.0);

        $tickets = new ArrayObject();
        $tickets->append($ticket);

        $ticketsProcessor->process($tickets, $installment);

        $this->assertEquals(1, count($installment->getPayments()));
        $this->assertEquals(150.0, $installment->getPayments()[0]->getValue());
    }

    public function testShouldProcessManyTicketsPayments()
    {
        $processor = new TicketsProcessor();

        $installment = new Installment('Vini', 300.0);

        $ticket1 = new Ticket(100.0);
        $ticket2 = new Ticket(200.0);

        $tickets = new ArrayObject();
        $tickets->append($ticket1);
        $tickets->append($ticket2);

        $processor->process($tickets, $installment);

        $this->assertEquals(2, count($installment->getPayments()));

        $value1 = $installment->getPayments()[0]->getValue();
        $this->assertEquals(100.0, $value1);

        $value2 = $installment->getPayments()[1]->getValue();
        $this->assertEquals(200.0, $value2);
    }

    public function testShouldCheckInstallmentAsPaid()
    {
        $processor = new TicketsProcessor();
        $installment = new Installment('Vini', 150.0);

        $tickets = new ArrayObject();
        $tickets->append(new Ticket(150.0));

        $processor->process($tickets, $installment);

        $this->assertTrue($installment->isPaid());
    }
}
