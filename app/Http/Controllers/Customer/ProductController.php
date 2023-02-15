<?php

namespace App\Http\Controllers\Customer;

use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->orderBy('name')
            ->get()
            ->each(function (Product $product) use ($request) {
                $product->is_favorite = $product->id === $request->user()->favorite_product_id;
            });

        return Inertia::render('customer/menu/page', [
            'products' => ProductData::collection($products),
        ]);
    }
}
