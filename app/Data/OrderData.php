<?php

namespace App\Data;

use App\Data\Shared\UserData;
use App\Enums\OrderStatus;
use App\Models\Order;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Support\Lazy\RelationalLazy;

class OrderData extends Data
{
    public function __construct(
        public ?int $id,
        public string $reference_number,
        public RelationalLazy|UserData $user,
        public RelationalLazy|ProductData $product,
        public OrderStatus $status,
        public ?string $notes,
        public ?Carbon $created_at,
    ) {}

    public static function fromModel(Order $order): self
    {
        return new self(
            $order->id,
            $order->reference_number,
            Lazy::whenLoaded(
                'user',
                $order,
                fn() => UserData::from($order->user)
            ),
            Lazy::whenLoaded(
                'product',
                $order,
                fn() => ProductData::from($order->product)
            ),
            $order->status,
            $order->notes ?? null,
            $order->created_at ?? null,
        );
    }
}
