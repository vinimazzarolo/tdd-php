<?php

namespace App\Store\HR;

class SalaryCalculator
{
    public function execute(Employee $employee): float
    {
        if ($employee->getSalary() > 3000) {
            return $employee->getSalary() * 0.8;
        }

        return $employee->getSalary() * 0.9;
    }
}
