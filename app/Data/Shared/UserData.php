<?php

namespace App\Data\Shared;

use App\Data\ProductData;
use App\Enums\UserRole;
use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Support\Lazy\RelationalLazy;

class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public UserRole $role,
        public RelationalLazy|ProductData|null $favorite_product,
    ) {}

    public static function fromModel(User $user): self
    {
        return new self(
            $user->id,
            $user->name,
            $user->email,
            $user->role,
            Lazy::whenLoaded(
                'favoriteProduct',
                $user,
                fn() => ProductData::fromModel($user->favoriteProduct)
            )
        );
    }
}

