<?php

namespace App\ValueObjects;

class Money
{
    private readonly int $cents;

    public function __construct(int $cents)
    {
        $this->cents = $cents;
    }

    public static function fromCents(int $cents): self
    {
        return new self($cents);
    }

    public static function fromDollars(float $dollars): self
    {
        return new self($dollars * 100);
    }

    public function toCents(): int
    {
        return $this->cents;
    }

    public function toDollars(): string
    {
        return number_format($this->cents / 100, 2);
    }
}
