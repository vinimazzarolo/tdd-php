<?php

namespace App\Store\Cart;

use App\Store\Produtct\Product;
use ArrayObject;

class Cart
{
    private ArrayObject $products;

    public function __construct()
    {
        $this->products = new ArrayObject();
    }

    public function add(Product $product): Cart
    {
        $this->products->append($product);
        return $this;
    }

    public function getProducts(): ArrayObject
    {
        return $this->products;
    }

    public function biggerPrice(): float
    {
        if (count($this->getProducts()) === 0) {
            return 0;
        }

        $biggerPrice = $this->getProducts()[0]->getPrice();

        foreach ($this->getProducts() as $product) {
            if ($biggerPrice < $product->getPrice()) {
                $biggerPrice = $product->getPrice();
            }
        }

        return $biggerPrice;
    }
}