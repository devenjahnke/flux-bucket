<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|int|exists:products,id'
        ]);

        $request->user()->update([
            'favorite_product_id' => $validated['product_id'] === $request->user()->favorite_product_id
                ? null
                : $validated['product_id']
        ]);

        return back();
    }
}
