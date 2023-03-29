<?php

namespace App\Store\HR;

class SalaryCalculator
{
    public function execute(Employee $employee): float
    {
        $rule = new Rule($employee->getRole());
        $classString = $rule->getRule();
        $instance = new $classString();
        return $instance->calculate($employee);
    }
}
