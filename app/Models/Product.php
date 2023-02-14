<?php

namespace App\Models;

use App\ValueObjects\Money;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            get: fn ($value) => Money::fromCents($value),
            set: fn ($value) => $value->toCents(),
        );
    }
}
