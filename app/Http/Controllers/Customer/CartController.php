<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|int|exists:products,id'
        ]);

        $request->session()->put('customer_cart_contents', $validated['product_id']);

        return back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->remove('customer_cart_contents');

        return back();
    }
}
