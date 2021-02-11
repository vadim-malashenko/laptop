<?php

namespace Laptop\Math\ComplexNumber\Form;

interface ComplexNumberFormInterface
{
    public function re(): float;
    public function im(): float;
    public function mod(): float;
    public function arg(): float;

    public function inv(): array;
    public function rec(): array;

    public function add(array $values): array;
    public function mul(array $values): array;
}