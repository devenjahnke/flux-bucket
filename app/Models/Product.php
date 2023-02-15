<?php

namespace App\Models;

use App\ValueObjects\Money;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Money::cents($value),
            set: fn ($value) => $value->cents,
        );
    }

    public function image(): Attribute
    {
        return Attribute::get(function ($value) {
            return asset(Storage::disk('public')->url($value));
        });
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
