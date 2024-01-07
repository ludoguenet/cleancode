<?php

namespace App\Http\Controllers;

use App\Enums\PriceTypeEnum;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function __invoke()
    {
        $products = $this->simulateShoppingCart();

        $totalPrice = $products->reduce(function (float $sum, Product $product) {
            $price = match ($product->type) {
                PriceTypeEnum::CLASSIC => $product->price,
                PriceTypeEnum::WITH_GARNISHES => $product->price + $product->garnishes->sum('price'),
                PriceTypeEnum::WITH_CUSTOM => $product->price + $product->customs->sum('price'),
            };
            return $sum + $price;
        }, 0);

        dd($totalPrice);
    }

    /**
     * @return Collection<int, Product>
     */
    private function simulateShoppingCart(): Collection
    {
        $products = Product::all()
            ->each(function (Product $product) {
               if ($product->type === PriceTypeEnum::WITH_GARNISHES) {
                   $product->garnishes()->sync([1, 2]);
               }

                if ($product->type === PriceTypeEnum::WITH_CUSTOM) {
                    $product->customs()->sync([1, 2]);
                }
            });

        return $products->loadMissing('garnishes', 'customs');
    }
}
