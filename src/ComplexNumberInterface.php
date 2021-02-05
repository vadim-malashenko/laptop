<?php

namespace Laptop\Math;

interface ComplexNumberInterface
{
    public function re(): float;
    public function im(): float;
    public function inv(): self;
    public function rec(): self;
    public function add(self $a): self;
    public function sub(self $a): self;
    public function mul($a): self;
    public function div($a): self;
}