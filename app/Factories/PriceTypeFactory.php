<?php

declare(strict_types=1);

namespace App\Factories;

use App\Abstract\AbstractPriceType;
use App\Enums\PriceTypeEnum;
use App\Models\Product;
use App\Support\Price\ClassicPriceType;
use App\Support\Price\WithCustomPriceType;
use App\Support\Price\WithGarnishPriceType;

class PriceTypeFactory
{
    public function make(Product $product): AbstractPriceType
    {
        return match ($product->type) {
            PriceTypeEnum::CLASSIC => new ClassicPriceType($product),
            PriceTypeEnum::WITH_GARNISHES => new WithGarnishPriceType($product),
            PriceTypeEnum::WITH_CUSTOM => new WithCustomPriceType($product),
        };
    }
}
