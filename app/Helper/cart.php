<?php

namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'productId' => $product->id,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
        ];
        session(['cart' => $item]);
    }
}
