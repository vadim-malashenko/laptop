<?php

namespace Laptop\Math\Test;

use PHPUnit\Framework\TestCase;

use Laptop\Math\ComplexNumber\{ComplexNumber, Form\AlgebraicForm};

class AlgebraicFormTest extends TestCase
{
    public function valuesProvider(): array
    {
        return ComplexNumberDataProvider::valuesProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function reProvider(): array
    {
        return ComplexNumberDataProvider::reProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function imProvider(): array
    {
        return ComplexNumberDataProvider::imProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function modProvider(): array
    {
        return ComplexNumberDataProvider::modProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function argProvider(): array
    {
        return ComplexNumberDataProvider::argProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function recProvider(): array
    {
        return ComplexNumberDataProvider::recProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function mulProvider(): array
    {
        return ComplexNumberDataProvider::mulProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    /**
     * @dataProvider valuesProvider
     * @param array $values
     * @param array $expected
     */
    public function testValues(array $values, array $expected): void
    {
        self::assertEquals($expected, (new AlgebraicForm($values))->values());
    }

    /**
     * @dataProvider reProvider
     * @param array $values
     * @param float $expected
     */
    public function testRe(array $values, float $expected): void
    {
        self::assertEquals($expected, (new AlgebraicForm($values))->re());
    }

    /**
     * @dataProvider imProvider
     * @param array $values
     * @param float $expected
     */
    public function testIm(array $values, float $expected): void
    {
        self::assertEquals($expected, (new AlgebraicForm($values))->im());
    }

    /**
     * @dataProvider modProvider
     * @param array $values
     * @param float $expected
     */
    public function testMod(array $values, float $expected): void
    {
        self::assertEquals($expected, (new AlgebraicForm($values))->mod());
    }

    /**
     * @dataProvider argProvider
     * @param array $values
     * @param float|string $expected
     */
    public function testArg(array $values, $expected): void
    {
        if (is_float($expected)) {
            self::assertEquals((float)$expected, (new AlgebraicForm($values))->arg());
        } else {
            $this->expectExceptionMessage($expected);
            (new AlgebraicForm($values))->arg();
        }
    }

    /**
     * @dataProvider recProvider
     * @param array $values
     * @param array|string $expected
     */
    public function testRec(array $values, $expected): void
    {
        if (is_array($expected)) {
            self::assertEquals($expected, (new AlgebraicForm($values))->rec());
        } else {
            $this->expectExceptionMessage($expected);
            (new AlgebraicForm($values))->rec();
        }
    }

    /**
     * @dataProvider mulProvider
     * @param array $values1
     * @param array $values2
     * @param array $expected
     */
    public function testMul(array $values1, array $values2, array $expected): void
    {
        self::assertEquals($expected, (new AlgebraicForm($values1))->mul($values2));
    }
}