<?php

namespace Laptop\Math\ComplexNumber\Form;

class AlgebraicForm extends AbstractForm
{
    public function re(): float
    {
        return $this->_values[0];
    }

    public function im(): float
    {
        return $this->_values[1];
    }

    public function mod(): float
    {
        return sqrt( $this->_values[0] ** 2 + $this->_values[1] ** 2);
    }

    public function arg(): float
    {
        if ($this->_values[0] === 0.0) {
            throw new \LogicException('Division by zero');
        }
        return atan( - $this->_values[1] / $this->_values[0]);
    }

    public function inv(): array
    {
        return [ - $this->_values[0], - $this->_values[1]];
    }

    public function rec(): array
    {
        $mod2 = $this->_values[0] * $this->_values[0] + $this->_values[1] * $this->_values[1];
        if ($mod2 === 0.0) {
            throw new \LogicException('Division by zero');
        }
        return [$this->_values[0] / $mod2, - $this->_values[1] / $mod2];
    }

    public function add(array $values): array
    {
        return [
            $this->_values[0] + $values[0],
            $this->_values[1] + $values[1]
        ];
    }

    public function mul(array $values): array
    {
        return [
            $this->_values[0] * $values[0] - $this->_values[1] * $values[1],
            $this->_values[0] * $values[1] + $this->_values[1] * $values[0]
        ];
    }
}