<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CatalogController extends Controller
{
    public function category(string $slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();
        $products = $category->products()->paginate(10);

        return view('category.index', compact('products', 'category'));
    }
}
