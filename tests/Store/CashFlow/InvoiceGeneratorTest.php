<?php

namespace Tests\Store\CashFlow;

use App\Store\CashFlow\InvoiceDao;
use App\Store\CashFlow\InvoiceGenerator;
use App\Store\CashFlow\Order;
use Mockery;
use PHPUnit\Framework\TestCase;

class InvoiceGeneratorTest extends TestCase
{
    public function testShouldGenerateInvoiceWithTaxes(): void
    {
        $dao = Mockery::mock(InvoiceDao::class);
        $dao->shouldReceive('persist')->andReturn(true);
        $generator = new InvoiceGenerator($dao);
        $order = new Order('Vini', 1000, 1);
        $invoice = $generator->generate($order);
        $this->assertEquals(1000 * 0.94, $invoice->getPrice());
    }

    public function testShouldPersistGeneratedInvoice(): void
    {
        $dao = Mockery::mock(InvoiceDao::class);
        $dao->shouldReceive('persist')->andReturn(true);

        $generator = new InvoiceGenerator($dao);
        $order = new Order('Vini', 1000, 1);
        $invoice = $generator->generate($order);

        $this->assertTrue($dao->persist($order));
        $this->assertEquals(1000 * 0.94, $invoice->getPrice());
    }
}
