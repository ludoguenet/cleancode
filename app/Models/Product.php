<?php

namespace App\Models;

use App\Enums\PriceTypeEnum;
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
}
