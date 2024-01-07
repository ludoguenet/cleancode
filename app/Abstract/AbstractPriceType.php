<?php

declare(strict_types=1);

namespace App\Abstract;

use App\Models\Product;

abstract class AbstractPriceType
{
    public function __construct(protected Product $product) {}

    abstract public function calculate(): int;
}
