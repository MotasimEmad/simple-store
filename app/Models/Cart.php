<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart
{
    use HasFactory;

    public $items = [];
    public $totalQty;
    public $totalPrice;

    public function __Construct($cart = null) {
        if($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function addToCart($product) {
        $items = [
            'title' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            'qty' => 0,
        ];

        if(!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $items;
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        } else {
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        }

        $this->items[$product->id]['qty'] += 1;
    }
}
