<?php

namespace Laptop\Math\Test;

use PHPUnit\Framework\TestCase;

use Laptop\Math\ComplexNumber\{ComplexNumber, Form\TrigonometricForm};

class TrigonometricFormTest extends TestCase
{
    public function valuesProvider(): array
    {
        return ComplexNumberDataProvider::valuesProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function reProvider(): array
    {
        return ComplexNumberDataProvider::reProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function imProvider(): array
    {
        return ComplexNumberDataProvider::imProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function modProvider(): array
    {
        return ComplexNumberDataProvider::modProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function argProvider(): array
    {
        return ComplexNumberDataProvider::argProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function recProvider(): array
    {
        return ComplexNumberDataProvider::recProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    public function mulProvider(): array
    {
        return ComplexNumberDataProvider::mulProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    /**
     * @dataProvider valuesProvider
     * @param array $values
     * @param array $expected
     */
    public function testValues(array $values, array $expected): void
    {
        self::assertEquals($expected, (new TrigonometricForm($values))->values());
    }

    /**
     * @dataProvider reProvider
     * @param array $values
     * @param float $expected
     */
    public function testRe(array $values, float $expected): void
    {
        self::assertEquals($expected, (new TrigonometricForm($values))->re());
    }

    /**
     * @dataProvider imProvider
     * @param array $values
     * @param float $expected
     */
    public function testIm(array $values, float $expected): void
    {
        self::assertEquals($expected, (new TrigonometricForm($values))->im());
    }

    /**
     * @dataProvider modProvider
     * @param array $values
     * @param float $expected
     */
    public function testMod(array $values, float $expected): void
    {
        self::assertEquals($expected, (new TrigonometricForm($values))->mod());
    }

    /**
     * @dataProvider argProvider
     * @param array $values
     * @param float $expected
     */
    public function testArg(array $values, float $expected): void
    {
        self::assertEquals($expected, (new TrigonometricForm($values))->arg());
    }

    /**
     * @dataProvider recProvider
     * @param array $values
     * @param float|string $expected
     */
    public function testRec(array $values, $expected): void
    {
        if (is_array($expected)) {
            self::assertEquals($expected, (new TrigonometricForm($values))->rec());
        } else {
            $this->expectExceptionMessage($expected);
            (new TrigonometricForm($values))->rec();
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
        self::assertEquals($expected, (new TrigonometricForm($values1))->mul($values2));
    }
}