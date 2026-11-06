<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $products = $category->products()->with('images')->paginate(10);

        return view('category.index', compact('products', 'category'));
    }

    public function product(string $slug)
    {
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();

        return view('product.index', compact('product'));
    }
}