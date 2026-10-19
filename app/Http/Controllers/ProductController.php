<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display all products.
     */
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    /**
     * Display a single product.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }
}
