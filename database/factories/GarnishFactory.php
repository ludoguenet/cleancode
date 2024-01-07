<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GarnishFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::random(),
            'price' => $this->faker->randomNumber(2),
        ];
    }
}
