<?php

namespace Laptop\Math\ComplexNumber\Form;

abstract class AbstractForm implements ComplexNumberFormInterface
{
    public array $_values;

    public function __construct(array $values)
    {
        $this->_values = array_map('floatval', $values);
    }

    public function values(): array
    {
        return $this->_values;
    }
}