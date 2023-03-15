<?php

namespace App\Examples;

class RomanConverter
{
    protected $numbers = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    public function execute(string $romanNumber): int
    {
        $accumulator = 0;
        $lastNumberOnRight = 0;

        for ($i = strlen($romanNumber) - 1; $i >= 0 ; $i--) {
            $current = 0;
            $currentNumber = $romanNumber[$i];
            if (array_key_exists($currentNumber, $this->numbers)) {
                $current = $this->numbers[$currentNumber];
            }

            $multiplier = 1;
            if ($current < $lastNumberOnRight) {
                $multiplier = -1;
            }

            $accumulator += ($current * $multiplier);

            $lastNumberOnRight = $current;
        }

        return $accumulator;
    }
}
