<?php
namespace App\Store\Produtct;

use App\Store\Cart\Cart;

class BiggerAndSmaller
{
    private Product $smaller;
    private Product $bigger;

    public function find(Cart $cart)
    {
        foreach ($cart->getProducts() as $product) {
            if (empty($this->smaller) || $product->getPrice() < $this->smaller->getPrice()) {
                $this->smaller = $product;
            }

            if (empty($this->bigger) || $product->getPrice() > $this->bigger->getPrice()) {
                $this->bigger = $product;
            }
        }
    }

    public function getSmaller(): Product
    {
        return $this->smaller;
    }

    public function getBigger(): Product
    {
        return $this->bigger;
    }
}