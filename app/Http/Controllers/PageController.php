<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use App\Models\CategoryBlog;

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
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }
}
