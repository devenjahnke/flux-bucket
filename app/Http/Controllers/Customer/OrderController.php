<?php

namespace App\Http\Controllers\Customer;

use App\Actions\GenerateUniqueOrderReferenceNumberAction;
use App\Data\OrderData;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrderController extends Controller
{
    public function index(Request $request): Response
    {
        $orders = Order::query()
            ->with('product')
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return Inertia::render('customer/order/index/page', [
            'orders' => OrderData::collection($orders),
        ]);
    }
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
