<?php

namespace Tests\Store\Product;

use App\Store\Cart\Cart;
use App\Store\Produtct\BiggerAndSmaller;
use App\Store\Produtct\Product;
use PHPUnit\Framework\TestCase;

class BiggerAndSmallerTest extends TestCase
{
    public function testAscOrder()
    {
        $cart = new Cart();
        $cart->add(new Product('Geladeira', 450.0));
        $cart->add(new Product('Liquidificador', 250.0));
        $cart->add(new Product('Jogo de pratos', 70.0));

        $biggerAndSmaller = new BiggerAndSmaller();
        $biggerAndSmaller->find($cart);

        $this->assertEquals('Jogo de pratos', $biggerAndSmaller->getSmaller()->getName());
        $this->assertEquals('Geladeira', $biggerAndSmaller->getBigger()->getName());
    }

    public function testOnlySingleProduct()
    {
        $cart = new Cart();
        $cart->add(new Product('Geladeira', 450.0));

        $biggerAndSmaller = new BiggerAndSmaller();
        $biggerAndSmaller->find($cart);

        $this->assertEquals('Geladeira', $biggerAndSmaller->getSmaller()->getName());
        $this->assertEquals('Geladeira', $biggerAndSmaller->getBigger()->getName());
    }
}