<?php

namespace Tests\Store\Builder;

use App\Store\Cart\Cart;
use App\Store\Produtct\Product;

class CartBuilder
{
    public Cart $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function withItems(): CartBuilder
    {
        $prices = func_get_args();

        foreach ($prices as $price) {
            $this->cart->add(new Product('Item', $price, 1));
        }

        return $this;
    }

    public function create(): Cart
    {
        return $this->cart;
    }
}