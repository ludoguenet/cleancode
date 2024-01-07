<?php

declare(strict_types=1);

namespace App\Enums;

enum PriceTypeEnum: string
{
    CASE CLASSIC = 'classic';
    CASE WITH_GARNISHES = 'with_garnishes';
    CASE WITH_CUSTOM = 'with_custom';
}
