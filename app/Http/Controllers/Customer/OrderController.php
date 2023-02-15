<?php

namespace App\Http\Controllers\Customer;

use App\Actions\GenerateUniqueOrderReferenceNumberAction;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|int|exists:products,id',
            'notes' => 'nullable|string',
        ]);

        Order::create([
            'reference_number' => GenerateUniqueOrderReferenceNumberAction::execute(),
            'product_id' => $validated['product_id'],
            'user_id' => $request->user()->id,
            'status' => OrderStatus::Pending,
            'notes' => $validated['notes']
        ]);

        return back();
    }
}
