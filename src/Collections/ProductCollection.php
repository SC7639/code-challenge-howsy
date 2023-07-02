<?php

declare(strict_types=1);

namespace App\Collections;

use App\Enums\Product;

class ProductCollection
{
    /**
     * @var Product[]
     */
    private $products = [];

    public function __construct(private bool $duplicatesAllowed = false, Product ...$products)
    {
        if ($duplicatesAllowed) {
            return;
        }

        $duplicates = array_reduce($products, fn ($duplicate, $product) => !$duplicate ?: array_search($product, $products) !== false, false);
        if ($duplicates) {
            throw new DuplicateItemException("Cannot have a duplicate product in this collection");
        }

        $this->products = $products;
    }

    /**
     * Adds item to the end of the collection
     *
     * @param Product $product
     * @throws Exception
     * @return void
     */
    public function push(Product $product): void
    {
        if (!$this->duplicatesAllowed && array_search($product, $this->products) !== false) {
            throw new DuplicateItemException("Product already exists in collection");
        }

        $this->products[] = $product;
    }

    public function all()
    {
        return $this->products;
    }
}

class DuplicateItemException extends \Exception
{
}
