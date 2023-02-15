<?php

namespace App\Data;

use App\Data\Shared\UserData;
use App\Enums\OrderStatus;

class OrderData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public ?int $id,
        public string $reference_number,
        public UserData $user,
        public ProductData $product,
        public OrderStatus $status,
        public ?string $notes,
    ) {}
}
