<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::with('category')->latest()->paginate(10);
        return view('blogs-section.list', compact('blogs'));
    }
    public function addblog()
    {
        $categories = Category::all();
        return view('blogs-section.create', compact('categories'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'breadcrumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date',
            'content' => 'nullable|string',
            'key_points' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }
        if ($request->hasFile('breadcrumb')) {
            $validated['breadcrumb'] = $request->file('breadcrumb')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function index()
    {
        $posts = Post::published()
            ->with(['category', 'user', 'tags'])
            ->withCount('comments')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = Category::withCount('posts')->get();
        $tags = Tag::all();
        $recentPosts = Post::published()->latest()->take(3)->get();

        return view('blog.index', compact('posts', 'categories', 'tags', 'recentPosts'));
    }
}
