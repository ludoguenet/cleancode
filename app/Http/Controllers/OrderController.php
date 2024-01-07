<?php

namespace App\Http\Controllers;

use App\Enums\PriceTypeEnum;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function __invoke()
    {
        $products = $this->simulateShoppingCart();

        $totalPrice = $products->reduce(fn (float $sum, Product $product) => $sum + $product->getTypePrice->calculate(), 0);

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
