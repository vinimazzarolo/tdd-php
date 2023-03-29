<?php

namespace Tests\Store\HR;

use App\Store\HR\Employee;
use App\Store\HR\Roles;
use App\Store\HR\SalaryCalculator;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    public function testCalculateDeveloperSalaryUnderLimit()
    {
        $calculator = new SalaryCalculator();
        $developer = new Employee('Vini', 1500.0, Roles::DEVELOPER);
        $salary = $calculator->execute($developer);
        $this->assertEquals(1500.0 * 0.9, $salary);
    }

    public function testCalculateDeveloperSalaryAboveLimit()
    {
        $calculator = new SalaryCalculator();
        $developer = new Employee('Vini', 4000.0, Roles::DEVELOPER);
        $salary = $calculator->execute($developer);
        $this->assertEquals(4000.0 * 0.8, $salary);
    }

    public function testCalculateDbaUnderLimitReceive15PercentDiscount()
    {
        $calculator = new SalaryCalculator();
        $dba = new Employee('Vini', 500.0, Roles::DBA);
        $salary = $calculator->execute($dba);
        $this->assertEquals(500 * 0.85, $salary);
    }

    public function testCalculateDbaSalaryUnderLimit()
    {
        $calculator = new SalaryCalculator();
        $dba = new Employee('Vini', 1500.0, Roles::DBA);
        $salary = $calculator->execute($dba);
        $this->assertEquals(1500 * 0.85, $salary);
    }

    public function testCalculateDbaSalaryOverLimit()
    {
        $calculator = new SalaryCalculator();
        $dba = new Employee('Vini', 4500.0, Roles::DBA);
        $salary = $calculator->execute($dba);
        $this->assertEquals(4500 * 0.75, $salary);
    }
}
