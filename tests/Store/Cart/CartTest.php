<?php

namespace Tests\Store\Cart;

use App\Store\Cart\Cart;
use App\Store\Produtct\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testShouldReturnZeroIfCartIsEmpty()
    {
        $cart = new Cart();
        $biggerPrice = $cart->biggerPrice();

        $this->assertEquals(0, $biggerPrice);
    }

    public function testShouldReturnProductPriceIfCartHas1Element()
    {
        $cart = new Cart();
        $cart->add(new Product('Geladeira', 900.0, 1));

        $biggerPrice = $cart->biggerPrice();

        $this->assertEquals(900, $biggerPrice);
    }

    public function testShouldReturnBiggerPriceIfCartHasMultipleElements()
    {
        $cart = new Cart();
        $cart->add(new Product('Geladeira', 900.0, 1));
        $cart->add(new Product('Fogão', 1500.0, 1));
        $cart->add(new Product('Máquina de lavar', 750.0, 1));

        $biggerPrice = $cart->biggerPrice();

        $this->assertEquals(1500.0, $biggerPrice);
    }
}