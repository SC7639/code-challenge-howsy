<?php

declare(strict_types=1);

namespace App\User;

use App\Enums\Product;

interface UserInterface
{
    public function getContractLengthMonths(): int;
}
