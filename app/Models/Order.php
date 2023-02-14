<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'user_id',
        'product_id',
        'status',
        'notes'
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];
}
