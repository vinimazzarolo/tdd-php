<?php

namespace App\Store\HR;

class Employee
{
    public function __construct(
        protected string $name,
        protected float $salary,
        protected int $role
    )
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRole(): int
    {
        return $this->role;
    }

}
