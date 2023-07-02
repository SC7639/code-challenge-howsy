<?php

namespace Tests;

use App\Enums\Product;
use App\User\User;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testPhotographyProductCorrect()
    {
        $this->assertEquals('P001', Product::Photography->value);
        $this->assertEquals(200, Product::Photography->price());
    }

    public function testFloorplanProductCorrect()
    {
        $this->assertEquals('P002', Product::Floorplan->value);
        $this->assertEquals(100, Product::Floorplan->price());
    }

    public function testGasCertificateProductCorrect()
    {
        $this->assertEquals('P003', Product::GasCertificate->value);
        $this->assertEquals(83.50, Product::GasCertificate->price());
    }

    public function testEICRCertificateProductCorrect()
    {
        $this->assertEquals('P004', Product::EICRCertificate->value);
        $this->assertEquals(51.00, Product::EICRCertificate->price());
    }
}
