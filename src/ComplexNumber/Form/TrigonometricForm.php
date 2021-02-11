<?php

namespace Laptop\Math\ComplexNumber\Form;

class TrigonometricForm extends AbstractForm
{
    public function __construct(array $values)
    {
        if ($values[0] === 0 && $values[1] === 0) {
            throw new \InvalidArgumentException('Complex number is equal to zero');
        }
        parent::__construct($values);
    }

    public function re(): float
    {
        return $this->_values[0] * cos($this->_values[1]);
    }

    public function im(): float
    {
        return $this->_values[0] * sin($this->_values[1]);
    }

    public function mod(): float
    {
        return $this->_values[0];
    }

    public function arg(): float
    {
        return $this->_values[1];
    }

    public function inv(): array
    {
        return [$this->_values[0], - $this->_values[1]];
    }

    public function rec(): array
    {
        if ($this->_values[0] === 0.0) {
            throw new \LogicException('Division by zero');
        }
        return [1 / $this->_values[0], - $this->_values[1]];
    }

    public function add(array $values): array
    {
        $x = $this->_values[0] * cos($this->_values[1]) + $values[0] * cos($values[1]);
        $arg = atan(($this->_values[0] * sin($this->_values[1]) + $values[0] * sin($values[1])) / $x);
        $mod = $x / cos($arg);
        return [$mod, $arg];
    }

    public function mul(array $values): array
    {
        return [
            $this->_values[0] * $values[0],
            $this->_values[1] + $values[1]
        ];
    }
}