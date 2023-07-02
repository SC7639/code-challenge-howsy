<?php

namespace Tests;

use App\Collections\ProductCollection;
use App\Enums\Product;
use PHPUnit\Framework\TestCase;

class ProductCollectionTest extends TestCase
{
    /**
    * @var ProductCollection
    */
    private $productCollection;

    protected function setUp(): void
    {
        $this->productCollection = new ProductCollection();
    }

    public function testPushItemToProductCollection()
    {
        $this->productCollection->push(Product::Floorplan);

        $this->assertEqualsCanonicalizing([Product::Floorplan], $this->productCollection->all());
    }

    public function testPushMultipleItemsToProductCollection()
    {
        $expected = [Product::EICRCertificate, Product::GasCertificate];
        $this->productCollection->push(Product::EICRCertificate);
        $this->productCollection->push(ProducT::GasCertificate);

        $this->assertEqualsCanonicalizing($expected, $this->productCollection->all());

        // Check values are in order
        $allCollectionItems = $this->productCollection->all();
        for ($i=0; $i < count($allCollectionItems); $i++) {
            $this->assertEquals($expected[$i], $allCollectionItems[$i]);
        }
    }
}
