<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';

    case Shipped = 'shipped';

    case Fulfilled = 'fulfilled';
}
