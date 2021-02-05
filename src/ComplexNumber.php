<?php

namespace Laptop\Math;

class ComplexNumber implements ComplexNumberInterface
{
    protected float $_re;
    protected float $_im;

    public function __construct(float $re, float $im)
    {
        $this->_re = $re;
        $this->_im = $im;
    }

    public function re(): float
    {
        return $this->_re;
    }

    public function im(): float
    {
        return $this->_im;
    }

    public function inv(): ComplexNumberInterface
    {
        return new static(- $this->re(), - $this->im());
    }

    public function rec(): ComplexNumberInterface
    {
        $a = $this->_re * $this->re() + $this->im() * $this->im();

        if ($a === (float)0) {
            throw new \LogicException('Division by zero');
        }

        return new static($this->re() / $a, - $this->im() / $a);
    }

    public function add(ComplexNumberInterface $a): ComplexNumberInterface
    {
        return new static($this->re() + $a->re(), $this->im() + $a->im());
    }

    public function sub(ComplexNumberInterface $a): ComplexNumberInterface
    {
        return $this->add($a->inv());
    }

    public function mul($a): ComplexNumberInterface
    {
        if ($a instanceof ComplexNumberInterface) {
            return new static($this->re() * $a->re() - $this->im() * $a->im(), $this->im() * $a->re() + $this->re() * $a->im());
        }

        if (is_numeric($a)) {
            $a = (float)$a;
            return new static($this->re() * $a, $this->im() * $a);
        }

        throw new \InvalidArgumentException('Expected instance of ComplexNumberInterface or numeric value');
    }

    public function div($a): ComplexNumberInterface
    {
        if ($a instanceof ComplexNumberInterface) {
            return $this->mul($a->rec());
        }

        if (is_numeric($a)) {
            $a = (float)$a;
            if ($a === (float)0) {
                throw new \LogicException('Division by zero');
            }
            return new static($this->re() / $a, $this->im() / $a);
        }

        throw new \InvalidArgumentException('Expected instance of ComplexNumberInterface or numeric value');
    }

    public function __toString(): string
    {
        $re = $this->re();
        $im = $this->im();

        $result = $re !== (float)0 ? (string)$re : '';

        if ($im !== (float)0) {
            $sign = $im >= 0 ? '+' : '-';
            $sign = $re === (float)0 && $sign === '+' ? '' : $sign;
            $im = abs($im) !== (float)1 ? abs($im) : '';
            $result .= "{$sign}{$im}i";
        } else if ($result === '') {
            $result = '0';
        }

        return $result;
    }

    public static function create(float $re, float $im): ComplexNumberInterface
    {
        return new static($re, $im);
    }
}