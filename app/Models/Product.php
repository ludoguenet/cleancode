<?php

namespace App\Models;

use App\Enums\PriceTypeEnum;
use App\Factories\PriceTypeFactory;
use App\Factories\TypePriceFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => PriceTypeEnum::class,
    ];

    public function garnishes(): BelongsToMany
    {
        return $this->belongsToMany(Garnish::class);
    }

    public function customs(): BelongsToMany
    {
        return $this->belongsToMany(Custom::class);
    }

    public function getTypePrice(): Attribute
    {
        return new Attribute(
            get: fn () => (new PriceTypeFactory)->make($this),
        );
    }
}
