<?php

namespace App\ValueObjects;

use http\Exception\InvalidArgumentException;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
final class Money
{
    public readonly int $cents;
    public readonly float $dollars;
    protected function __construct(int $cents)
    {
        if ($cents < 0) {
            throw new InvalidArgumentException();
        }
        $this->cents = $cents;
        $this->dollars = number_format($this->cents / 100, 2);
    }

    public static function cents(int $cents): self
    {
        return new self($cents);
    }

    public static function dollars(float $dollars): self
    {
        return new self(bcmul($dollars, 100));
    }
}
