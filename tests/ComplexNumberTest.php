<?php

namespace Laptop\Math\Test;

use PHPUnit\Framework\TestCase;

use Laptop\Math\ComplexNumber\ComplexNumber;

class ComplexNumberTest extends TestCase
{
    public function subAlgebraicProvider(): array
    {
        return ComplexNumberDataProvider::subProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function divAlgebraicProvider(): array
    {
        return ComplexNumberDataProvider::divProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function setFormAlgebraicTrigonometricProvider(): array
    {
        return ComplexNumberDataProvider::setFormProvider(ComplexNumber::ALGEBRAIC_FORM);
    }

    public function setFormTrigonometricAlgebraicProvider(): array
    {
        return ComplexNumberDataProvider::setFormProvider(ComplexNumber::TRIGONOMETRIC_FORM);
    }

    /**
     * @dataProvider subAlgebraicProvider
     * @param array $values1
     * @param array $values2
     * @param array $expected
     */
    public function testSubAlgebraic(array $values1, array $values2, array $expected): void
    {
        self::assertEquals(
            $expected,
            ComplexNumber::createAlgebraicForm($values1)->sub(ComplexNumber::createAlgebraicForm($values2))->values()
        );
    }

    /**
     * @dataProvider divAlgebraicProvider
     * @param array $values1
     * @param array $values2
     * @param array|string $expected
     */
    public function testDivAlgebraic(array $values1, array $values2, $expected): void
    {
        if (is_array($expected)) {
            self::assertEquals(
                $expected,
                ComplexNumber::createAlgebraicForm($values1)->div(ComplexNumber::createAlgebraicForm($values2))->values()
            );
        } else {
            $this->expectExceptionMessage($expected);
            ComplexNumber::createAlgebraicForm($values1)->div(ComplexNumber::createAlgebraicForm($values2));
        }
    }

    /**
     * @dataProvider setFormAlgebraicTrigonometricProvider
     * @param array $values
     * @param array|string $expected
     */
    public function testSetFormAlgebraicTrigonometric(array $values, $expected): void
    {
        if (is_array($expected)) {
            self::assertEquals(
                $expected,
                ComplexNumber::createAlgebraicForm($values)->setForm(ComplexNumber::TRIGONOMETRIC_FORM)->values()
            );
        } else {
            $this->expectExceptionMessage($expected);
            ComplexNumber::createAlgebraicForm($values)->setForm(ComplexNumber::TRIGONOMETRIC_FORM)->values();
        }
    }

    /**
     * @dataProvider setFormTrigonometricAlgebraicProvider
     * @param array $values
     * @param array|string $expected
     */
    public function testSetFormTrigonometricAlgebraic(array $values, $expected): void
    {
        if (is_array($expected)) {
            self::assertEquals(
                $expected,
                ComplexNumber::createTrigonometricForm($values)->setForm(ComplexNumber::ALGEBRAIC_FORM)->values()
            );
        } else {
            $this->expectExceptionMessage($expected);
            ComplexNumber::createTrigonometricForm($values)->setForm(ComplexNumber::ALGEBRAIC_FORM)->values();
        }
    }
}