<?php

declare(strict_types=1);

namespace App\Enums;

enum Product: string
{
    case Photography = "P001";
    case Floorplan = "P002";
    case GasCertificate = "P003";
    case EICRCertificate = "P004";

    /**
     *
     */
    public function price(): float
    {
        return match ($this) {
            Product::Photography => 200,
            Product::Floorplan => 100,
            Product::GasCertificate => 83.50,
            Product::EICRCertificate => 51.00,
        };
    }
}
