<?php

namespace Tests\Store\CashFlow;

use App\Store\CashFlow\InvoiceDao;
use App\Store\CashFlow\InvoiceGenerator;
use App\Store\CashFlow\Order;
use App\Store\CashFlow\SAP;
use Mockery;
use PHPUnit\Framework\TestCase;

class InvoiceGeneratorTest extends TestCase
{
    public function testShouldGenerateInvoiceWithTaxes(): void
    {
        $dao = Mockery::mock(InvoiceDao::class);
        $dao->shouldReceive('persist')->andReturn(true);

        $sap = Mockery::mock(SAP::class);
        $sap->shouldReceive('send')->andReturn(true);

        $generator = new InvoiceGenerator($dao, $sap);
        $order = new Order('Vini', 1000, 1);
        $invoice = $generator->generate($order);
        $this->assertEquals(1000 * 0.94, $invoice->getPrice());
    }

    public function testShouldPersistGeneratedInvoice(): void
    {
        $dao = Mockery::mock(InvoiceDao::class);
        $dao->shouldReceive('persist')->andReturn(true);

        $sap = Mockery::mock(SAP::class);
        $sap->shouldReceive('send')->andReturn(true);

        $generator = new InvoiceGenerator($dao, $sap);
        $order = new Order('Vini', 1000, 1);
        $invoice = $generator->generate($order);

        $this->assertTrue($dao->persist($order));
        $this->assertEquals(1000 * 0.94, $invoice->getPrice());
    }

    public function testShouldSendGeneratedInvoiceToSAP(): void
    {
        $dao = Mockery::mock(InvoiceDao::class);
        $dao->shouldReceive('persist')->andReturn(true);

        $sap = Mockery::mock(SAP::class);
        $sap->shouldReceive('send')->andReturn(true);

        $generator = new InvoiceGenerator($dao, $sap);
        $order = new Order('Vini', 1000, 1);
        $invoice = $generator->generate($order);

        $this->assertTrue($sap->send($invoice));
        $this->assertEquals(1000 * 0.94, $invoice->getPrice());
    }
}
