<?php

namespace Tests\Store\Cart;

use App\Store\Cart\Cart;
use App\Store\Produtct\Product;
use PHPUnit\Framework\TestCase;
use Tests\Store\Builder\CartBuilder;

class CartTest extends TestCase
{
    private Cart $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart();
        parent::setUp();
    }

    public function testShouldReturnZeroIfCartIsEmpty()
    {
        $biggerPrice = $this->cart->biggerPrice();
        $this->assertEquals(0, $biggerPrice);
    }

    public function testShouldReturnProductPriceIfCartHas1Element()
    {
        $cart = (new CartBuilder())
            ->withItems(900)
            ->create();

        $biggerPrice = $cart->biggerPrice();
        $this->assertEquals(900, $biggerPrice);
    }

    public function testShouldReturnBiggerPriceIfCartHasMultipleElements()
    {
        $this->cart->add(new Product('Geladeira', 900.0, 1));
        $this->cart->add(new Product('Fogão', 1500.0, 1));
        $this->cart->add(new Product('Máquina de lavar', 750.0, 1));

        $biggerPrice = $this->cart->biggerPrice();

        $this->assertEquals(1500.0, $biggerPrice);
    }
}