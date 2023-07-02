<?php

namespace Tests;

use App\Checkout\Checkout;
use App\Enums\Product;
use App\User\User;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    /**
     * @var Checkout
     */
    private $checkout;

    protected function setUp(): void
    {
        $defaultUser = new User();
        $this->checkout = new Checkout($defaultUser);
    }

    public function testAddingPhotography()
    {
        $itemAdded = $this->checkout->add(Product::Photography);
        $this->assertTrue($itemAdded);
    }

    public function testAddingDuplicateProduct()
    {
        $firstPhotographyItemAdded = $this->checkout->add(Product::Photography);
        $secondPhotographyItemAdded = $this->checkout->add(Product::Photography);

        $this->assertTrue($firstPhotographyItemAdded);
        $this->assertFalse($secondPhotographyItemAdded);
    }

    public function testCheckoutTotal()
    {
        $totalShouldBe = Product::Photography->price() + Product::GasCertificate->price();

        $this->checkout->add(Product::Photography);
        $this->checkout->add(Product::GasCertificate);
        $checkoutTotal = $this->checkout->total();

        $this->assertEquals($totalShouldBe, $checkoutTotal);
    }

    public function testUserDiscountApplies()
    {
        $totalShouldBe = Product::EICRCertificate->price() + Product::Floorplan->price();
        $discount = $totalShouldBe * 0.1;
        $totalShouldBe -= $discount;

        $checkout = new Checkout(new User(12));
        $checkout->add(Product::EICRCertificate);
        $checkout->add(Product::Floorplan);

        $this->assertEquals($totalShouldBe, $checkout->total());

    }
}
