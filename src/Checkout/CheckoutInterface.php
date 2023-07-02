<?php

declare(strict_types=1);

namespace App\Checkout;

use App\Enums\Product;

interface CheckoutInterface
{
    public function add(Product $item): bool;
    public function total(): float;
}
