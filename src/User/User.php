<?php

declare(strict_types=1);

namespace App\User;

class User implements UserInterface
{
    public function __construct(private int $contractLengthMonths = 6)
    {
    }

    public function getContractLengthMonths(): int
    {
        return $this->contractLengthMonths;
    }
}
