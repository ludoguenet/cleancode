<?php

declare(strict_types=1);

namespace App\Support\Price;

use App\Abstract\AbstractPriceType;

class WithGarnishPriceType extends AbstractPriceType
{
    public function calculate(): int
    {
        return $this->product->price + $this->product->garnishes->sum('price');
    }
}
