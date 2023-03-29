<?php

namespace App\Store\HR;

interface ISalaryRule
{
    public function calculate(Employee $employee);
}
