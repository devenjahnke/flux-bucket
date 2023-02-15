<?php

namespace App\Data;

use App\Models\Product;
use App\ValueObjects\Money;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public Money $price,
        public string $image,
        public ?bool $is_favorite
    ) {}

    public static function fromModel(Product $product): self
    {
        return new self(
            id: $product->id,
            name: $product->name,
            description: $product->description,
            price: $product->price,
            image: $product->image,
            is_favorite: $product->is_favorite,
        );
    }
}
