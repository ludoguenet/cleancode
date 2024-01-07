<?php

declare(strict_types=1);

namespace App\Support\Price;

use App\Abstract\AbstractPriceType;

class WithCustomPriceType extends AbstractPriceType
{
    public function calculate(): int
    {
        return $this->product->price + $this->product->customs->sum('price');
    }
}
