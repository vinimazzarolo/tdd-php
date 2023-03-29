<?php

namespace App\Store\HR;

class FifteenOrTwentyFivePercent implements ISalaryRule
{
    public function calculate(Employee $employee)
    {
        if ($employee->getSalary() < 2500.0) {
            return $employee->getSalary() * 0.85;
        }

        return $employee->getSalary() * 0.75;
    }
}
