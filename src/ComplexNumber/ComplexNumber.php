<?php

namespace Laptop\Math\ComplexNumber;

use Laptop\Math\ComplexNumber\Form\{AlgebraicForm, TrigonometricForm, ComplexNumberFormInterface};

class ComplexNumber implements ComplexNumberInterface
{
    public const ALGEBRAIC_FORM = 0;
    public const TRIGONOMETRIC_FORM = 1;

    protected ComplexNumberFormInterface $_form;

    public function __construct(float $a, float $b, int $form = 0)
    {
        switch ($form) {
            case static::ALGEBRAIC_FORM:
                $this->_form = new AlgebraicForm([$a, $b]);
                break;
            case static::TRIGONOMETRIC_FORM:
                $this->_form = new TrigonometricForm([$a, $b]);
                break;
            default:
                throw new \InvalidArgumentException('Unknown complex number form');
        }
    }

    public function re(): float
    {
        return $this->_form->re();
    }

    public function im(): float
    {
        return $this->_form->im();
    }

    public function mod(): float
    {
        return $this->_form->mod();
    }

    public function arg(): float
    {
        return $this->_form->arg();
    }

    public function inv(): ComplexNumberInterface
    {
        return static::create($this->_form->inv(), $this->getForm());
    }

    public function rec(): ComplexNumberInterface
    {
        return static::create($this->_form->rec(), $this->getForm());
    }

    public function add(ComplexNumberInterface $number): ComplexNumberInterface
    {
        return static::create($this->_form->add($number->setForm($this->getForm())->values()), $this->getForm());
    }

    public function sub(ComplexNumberInterface $number): ComplexNumberInterface
    {
        return $this->add($number->inv());
    }

    public function mul(ComplexNumberInterface $number): ComplexNumberInterface
    {
        return static::create($this->_form->mul($number->setForm($this->getForm())->values()), $this->getForm());
    }

    public function div(ComplexNumberInterface $number): ComplexNumberInterface
    {
        return $this->mul($number->rec());
    }

    public function values(): array
    {
        return $this->_form->values();
    }

    public function getForm(): int
    {
        switch (\get_class($this->_form)) {
            case AlgebraicForm::class:
                return static::ALGEBRAIC_FORM;
            case TrigonometricForm::class:
                return static::TRIGONOMETRIC_FORM;
            default:
                return -1;
        }
    }

    public function setForm(int $form): ComplexNumberInterface
    {
        if ($this->getForm() === $form) {
            return $this;
        }
        switch ($form) {
            case static::ALGEBRAIC_FORM:
                return $this->toAlgebraicForm();
            case static::TRIGONOMETRIC_FORM:
                return $this->toTrigonometricForm();
        }
    }

    public function toAlgebraicForm(): ComplexNumberInterface
    {
        return static::createAlgebraicForm([$this->_form->re(), $this->_form->im()]);
    }

    public function toTrigonometricForm(): ComplexNumberInterface
    {
        return static::createTrigonometricForm([$this->_form->mod(), $this->_form->arg()]);
    }

    public static function create(array $values, int $form): ComplexNumberInterface
    {
        return new static($values[0], $values[1], $form);
    }

    public static function createAlgebraicForm(array $values): ComplexNumberInterface
    {
        return static::create($values, static::ALGEBRAIC_FORM);
    }

    public static function createTrigonometricForm(array $values): ComplexNumberInterface
    {
        return static::create($values, static::TRIGONOMETRIC_FORM);
    }
}