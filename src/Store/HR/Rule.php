<?php

namespace App\Store\HR;

use Exception;

class Rule
{
    private array $rules = [
        Roles::DEVELOPER => TenOrTwentyPercent::class,
        Roles::DBA => FifteenOrTwentyFivePercent::class,
        Roles::TESTER => FifteenOrTwentyFivePercent::class
    ];

    private $rule;

    public function __construct($rule)
    {
        if (array_key_exists($rule, $this->rules)) {
            $this->rule = $this->rules[$rule];
        } else {
            throw new Exception('Invalid rule.');
        }
    }

    public function getRule()
    {
        return $this->rule;
    }
}
