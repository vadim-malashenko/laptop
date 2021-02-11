<?php

namespace Laptop\Math\ComplexNumber;

interface ComplexNumberInterface
{
    public function re(): float;
    public function im(): float;
    public function mod(): float;
    public function arg(): float;

    public function rec(): ComplexNumberInterface;

    public function add(ComplexNumberInterface $number): ComplexNumberInterface;
    public function sub(ComplexNumberInterface $number): ComplexNumberInterface;
    public function mul(ComplexNumberInterface $number): ComplexNumberInterface;
    public function div(ComplexNumberInterface $number): ComplexNumberInterface;

    public function values(): array;
    public function getForm(): int;
    public function setForm(int $form): ComplexNumberInterface;

    public static function create(array $values, int $form): ComplexNumberInterface;

    public function toAlgebraicForm(): ComplexNumberInterface;
    public function toTrigonometricForm(): ComplexNumberInterface;
}