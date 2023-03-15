<?php

namespace Tests\Examples;

use App\Examples\RomanConverter;
use PHPUnit\Framework\TestCase;

class RomanNumberConverterTest extends TestCase
{
    public function testMustUnderstandISymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("I");
        $this->assertEquals(1, $number);
    }

    public function testMustUnderstandVSymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("V");
        $this->assertEquals(5, $number);
    }

    public function testMustUnderstandIISymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("II");
        $this->assertEquals(2, $number);
    }

    public function testMustUnderstandXXIISymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("XXII");
        $this->assertEquals(22, $number);
    }

    public function testMustUnderstandIXSymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("IX");
        $this->assertEquals(9, $number);
    }

    public function testMustUnderstandXXIVSymbol()
    {
        $romanConverter = new RomanConverter();
        $number = $romanConverter->execute("XXIV");
        $this->assertEquals(24, $number);
    }
}
