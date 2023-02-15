<?php

namespace App\Data\Shared;

use App\Data\ProductData;
use App\Models\Product;
use Closure;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScriptType;

class SharedData extends Data
{
    public function __construct(
        #[TypeScriptType(UserData::class)]
        public ?Closure $user = null,
        public ?NotificationData $notification = null,
        public ?ProductData $cart = null,
    ) {
        $this->shareNotification();
        $this->getCartContents();
    }

    protected function shareNotification(): void
    {
        if (session('notification')) {
            $this->notification = new NotificationData(
                ...session('notification')
            );
        }
    }

    protected function getCartContents(): void
    {
        if (session('customer_cart_contents')) {
            $this->cart = ProductData::from(
                Product::find(session('customer_cart_contents'))
            );
        }
    }
}
