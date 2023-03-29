<?php

namespace App\Store\HR;

class TenOrTwentyPercent implements ISalaryRule
{
    public function calculate(Employee $employee)
    {
        if ($employee->getSalary() > 3000) {
            return $employee->getSalary() * 0.8;
        }

        return $employee->getSalary() * 0.9;
    }
}
