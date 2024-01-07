<?php

namespace Database\Factories;

use App\Enums\PriceTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::random(),
            'type' => $this->faker->randomElement(PriceTypeEnum::cases()),
            'price' => $this->faker->randomNumber(2),
        ];
    }
}
