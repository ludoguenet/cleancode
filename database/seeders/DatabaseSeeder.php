<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\PriceTypeEnum;
use App\Models\Custom;
use App\Models\Garnish;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::factory(3)
            ->sequence(
                [
                    'name' => 'Cappuccino',
                    'price' => 5,
                    'type' => PriceTypeEnum::CLASSIC,
                ],
                [
                    'name' => 'Cold Brew Latte',
                    'price' => 7,
                    'type' => PriceTypeEnum::WITH_GARNISHES,
                ],
                [
                    'name' => 'Iced Toffee Nut Latte',
                    'price' => 8,
                    'type' => PriceTypeEnum::WITH_CUSTOM,
                ],
            )
            ->create();

        Garnish::factory(2)
            ->sequence(
                [
                    'name' => 'Chantilly',
                    'price' => 1,
                ],
                [
                    'name' => 'Noisettes',
                    'price' => 2,
                ],
            )
            ->create();

        Custom::factory(2)
            ->sequence(
                [
                    'name' => 'Mix Chocolats',
                    'price' => 3,
                ],
                [
                    'name' => 'Mix Epices',
                    'price' => 2,
                ],
            )
            ->create();
    }
}
