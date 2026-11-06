<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Managemen Produk || PPKD Sticker';
        $products = Product::with(['category', 'images'])->get();

        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Product || PPKD Sricker';
        $categories = Category::get();

        return view('admin.product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug',
            'price' => 'required|numeric',
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price_art_cartoon' => 'nullable|numeric',
            'price_art_paper' => 'nullable|numeric',
            'price_hvs' => 'nullable|numeric',
            'price_doff' => 'nullable|numeric',
            'price_glossy' => 'nullable|numeric',
            'price_cutting' => 'nullable|numeric',

            // Ubah dari 'image' jadi 'images' biar sinkron sama input multiple
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:png,jpg,jpeg,webp|max:2048',
            'alt' => 'nullable|array',
            'alt.*' => 'nullable|string|max:255',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $productData = collect($validated)->except(['images', 'alt'])->toArray();
        $product = Product::create($productData);

        if ($request->hasFile('images')) {
            $imageData = [];
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('products', 'public');

                $imageData[] = [
                    'path' => $path,
                    'alt' => $request->input("alt.{$key}") ?? $product->name,
                    'sort_order' => $key + 1,
                ];
            }
            $product->images()->createMany($imageData);
        }

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug,'.$product->id,
            'price' => 'required|numeric',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:png,jpg,jpeg,webp|max:2048',
            'alt' => 'nullable|array',
            'alt.*' => 'nullable|string|max:255',

            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price_art_cartoon' => 'nullable|numeric',
            'price_art_paper' => 'nullable|numeric',
            'price_hvs' => 'nullable|numeric',
            'price_doff' => 'nullable|numeric',
            'price_glossy' => 'nullable|numeric',
            'cutting_price' => 'nullable|numeric',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $productData = collect($validated)->except(['images', 'alt'])->toArray();
        $product->update($productData);

        if ($request->hasFile('images')) {
            $imageData = [];
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('products', 'public');

                $imageData[] = [
                    'path' => $path,
                    'alt' => $request->input("alt.{$key}") ?? $product->name,
                    'sort_order' => $product->images()->count() + $key + 1,
                ];
            }
            $product->images()->createMany($imageData);
        }

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil dihapus!');
    }
}
