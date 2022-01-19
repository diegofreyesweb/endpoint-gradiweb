<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('category')->get();

        return response()->json([
			'products' => $products,
		],200);
    }

    public function show($id)
    {
        $product = Product::with('category','variations')->findOrFail($id);

        return response()->json([
			'product' => $product,
		],200);
    }
}
