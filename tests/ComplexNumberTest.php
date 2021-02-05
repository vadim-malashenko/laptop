<?php

namespace Laptop\Math\Test;

use Laptop\Math\ComplexNumber;
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{
    public function testConstruct(): void
    {
        $re = 2;
        $im = -3;
        $a = new ComplexNumber($re, $im);

        self::assertEquals($re, $a->re());
        self::assertEquals($im, $a->im());
    }

    public function testCreate(): void
    {
        $re = 2;
        $im = -3;
        $a = ComplexNumber::create($re, $im);

        self::assertEquals($re, $a->re());
        self::assertEquals($im, $a->im());
    }

    public function testToString(): void
    {
        self::assertEquals('0', new ComplexNumber(0, 0));
        self::assertEquals('1', new ComplexNumber(1, 0));
        self::assertEquals('-1', new ComplexNumber(-1, 0));
        self::assertEquals('i', new ComplexNumber(0, 1));
        self::assertEquals('-i', new ComplexNumber(0, -1));
        self::assertEquals('2i', new ComplexNumber(0, 2));
        self::assertEquals('-2i', new ComplexNumber(0, -2));
        self::assertEquals('1+i', new ComplexNumber(1, 1));
        self::assertEquals('1-i', new ComplexNumber(1, -1));
        self::assertEquals('1+2i', new ComplexNumber(1, 2));
        self::assertEquals('1-2i', new ComplexNumber(1, -2));
        self::assertEquals('-1-i', new ComplexNumber(-1, -1));
        self::assertEquals('-1-2i', new ComplexNumber(-1, -2));
    }

    public function testZero(): void
    {
        self::assertEquals('0', ComplexNumber::create(0, 0));
    }

    public function testOne(): void
    {
        self::assertEquals('1+i', ComplexNumber::create(1, 1));
    }

    public function testInv(): void
    {
        self::assertEquals('-1-i', ComplexNumber::create(1, 1)->inv());
    }

    public function testAdd(): void
    {
        $one = ComplexNumber::create(1, 1);
        $zero = ComplexNumber::create(0, 0);
        $a = ComplexNumber::create(2, 3);
        $b = ComplexNumber::create(3, -2);
        $c = ComplexNumber::create(-2, -3);
        self::assertEquals('2+2i', $one->add($one));
        self::assertEquals('0', $one->sub($one));
        self::assertEquals('1+i', $one->add($zero));
        self::assertEquals('1+i', $one->sub($zero));
        self::assertEquals('1+i', $zero->add($one));
        self::assertEquals('-1-i', $zero->sub($one));
        self::assertEquals('0', $one->add($one->inv()));
        self::assertEquals($one->add($one->inv()), $one->sub($one));
        self::assertEquals((string)$a->add($c->add($b)), $a->add($b->add($c)));
    }

    public function testRec(): void
    {
        $one = ComplexNumber::create(1, 1);
        $zero = ComplexNumber::create(0, 0);
        self::assertEquals('0.5-0.5i', $one->rec());
        $this->expectExceptionMessage('Division by zero');
        $zero->rec();
    }

    public function testMulDiv(): void
    {
        $one = ComplexNumber::create(1, 1);
        $zero = ComplexNumber::create(0, 0);
        $a = ComplexNumber::create(2, 3);
        $b = ComplexNumber::create(3, -2);
        $c = ComplexNumber::create(-2, -3);
        self::assertEquals('2i', $one->mul($one));
        self::assertEquals((string)$a, $a->mul(1));
        self::assertEquals('2+2i', $one->mul(2));
        self::assertEquals('0', $one->mul(0));
        self::assertEquals((string)$a->mul($b), $b->mul($a));
        self::assertEquals((string)$a->mul($b)->mul($c), $a->mul($c)->mul($b));
        self::assertEquals((string)$a->mul($b->add($c)), $a->mul($b)->add($a->mul($c)));
        self::assertEquals('1', $one->div($one));
        self::assertEquals((string)$a, $a->div(1));
        self::assertEquals('0.5+0.5i', $one->div(2));
        self::assertEquals((string)$one->div($one), $one->mul($one->rec()));
        self::assertEquals('0', $zero->div($one));
        $this->expectExceptionMessage('Division by zero');
        $one->div(0);
        $this->expectExceptionMessage('Division by zero');
        $one->div($zero);
        $this->expectExceptionMessage('Expected instance of ComplexNumberInterface or numeric value');
        $one->div('');
        $this->expectExceptionMessage('Expected instance of ComplexNumberInterface or numeric value');
        $one->mul('');
    }
}