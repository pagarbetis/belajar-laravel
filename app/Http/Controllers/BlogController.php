<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manajemen Blog || PPKD Sticker';
        $blogs = Blog::with('category')->get();

        return view('admin.blog.index', compact('title', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Blog || PPKD Sticker';
        $categories = CategoryBlog::get();

        return view('admin.blog.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'blog_category_id' => 'required|exists:category_blogs,id',
            'brief_description' => 'nullable|string',
            'slug' => 'nullable|string|unique:blogs,slug,',
            'content' => 'nullable|string',
            'author' => 'nullable|string',
            'cover_path' => 'image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        if ($request->hasFile('cover_path')) {
            $validated['cover_path'] = $request->file('cover_path')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan!');
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
    public function edit(Blog $blog)
    {
        $title = 'Ubah Blog || PPKD Sticker';

        return view('admin.blog.edit', compact('blog', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'blog_category_id' => 'required|exists:category_blogs,id',
            'brief_description' => 'nullable|string',
            'slug' => 'nullable|string|unique:category_blogs,slug,id',
            'content' => 'nullable|string',
            'author' => 'nullable|string',
            'cover_path' => 'nullable|image|mimes:png,jpg,jpeg,webp,jfif|max:2048',
        ]);

        if ($request->hasFile('cover_path')) {
            if ($blog->cover_path) {
                Storage::disk('public')->delete($blog->cover_path);
            }
        }

        if (empty($request->slug)) {
            $validated['slug'] = Str::slug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($request->slug);
        }

     
        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        // Diperbaiki dari $product->img menjadi $product->image
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus!');
    }
}
