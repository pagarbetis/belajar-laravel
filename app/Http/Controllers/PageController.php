<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Setting;

class PageController extends Controller
{
    public function faq()
    {
        return view('faq.index');
    }

    public function contact()
    {
        $setting = Setting::get();

        return view('contact.index', compact('setting'));
    }

    public function blog()
    {
        $categories = CategoryBlog::withCount('blogs')->get();
        $totalBlogsCount = Blog::count();
        $latestBlog = Blog::latest()->first();
        $blogs = Blog::latest()->skip(1)->take(6)->get();

        return view('blog.index', compact('latestBlog', 'blogs', 'totalBlogsCount', 'categories'));
    }

    public function showBlog($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->firstOrFail();

        $previousBlog = Blog::where('id', '<', $blog->id)->latest('id')->first();
        $nextBlog = Blog::where('id', '>', $blog->id)->oldest('id')->first();
        $relatedBlogs = Blog::with('category')
            ->where('blog_category_id', $blog->blog_category_id)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'previousBlog', 'nextBlog', 'relatedBlogs'));
    }
}
