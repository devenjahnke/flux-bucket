<?php

namespace App\Actions;

use App\Models\Order;
use Arr;
use Str;

class GenerateUniqueOrderReferenceNumberAction
{
    public static function execute(): string
    {
        while (true) {
            $letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

            $reference_number = Arr::random($letters) . Arr::random($letters) . Str::padLeft(random_int(0,999999), '6', '0');

            if (! Order::where('reference_number', $reference_number)->exists()) {
                return $reference_number;
            }
        }
    }
}
