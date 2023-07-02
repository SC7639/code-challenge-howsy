<?php

declare(strict_types=1);

namespace App\Checkout;

use App\Collections\DuplicateItemException;
use App\Collections\ProductCollection;
use App\Enums\Product;
use App\User\User;

class Checkout implements CheckoutInterface
{
    public function __construct(private User $user, private ProductCollection $basket = new ProductCollection(), private int $contractLengthDiscountMonths = 12, private int $discountPercent = 10)
    {
    }

    public function add(Product $item): bool
    {
        try {
            $this->basket->push($item);
        } catch (DuplicateItemException $e) {
            return false;
        } catch (\Exception $e) {
            // Handle other exceptions here
        }

        return true;
    }

    private function userHasDiscount(): bool
    {
        if ($this->user->getContractLengthMonths() === $this->contractLengthDiscountMonths) {
            return true;
        }

        return false;
    }

    public function total(): float
    {
        $discountTotal = 0;
        $productsTotal = array_reduce($this->basket->all(), fn ($total, $item) => $total + $item->price());
        if ($this->userHasDiscount()) {
            $discountTotal = $productsTotal * ($this->discountPercent / 100);
        }

        return $productsTotal - $discountTotal;
    }
}
