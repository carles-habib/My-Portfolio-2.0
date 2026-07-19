<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Public blog listing — admins also see unpublished drafts for management
    public function index()
    {
        $query = Post::query();

        if (! (auth()->check() && auth()->user()->hasRole('admin'))) {
            $query->published();
        }

        $posts = $query->with(['category', 'user', 'tags'])
            ->withCount('comments')
            ->latest()
            ->paginate(6);

        [$categories, $tags, $recentPosts] = $this->sidebarData();

        return view('pages.blog', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    // Filter the public listing by category
    public function category(Category $category)
    {
        $posts = Post::published()
            ->where('category_id', $category->id)
            ->with(['category', 'user', 'tags'])
            ->withCount('comments')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        [$categories, $tags, $recentPosts] = $this->sidebarData();

        return view('pages.blog', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    // Filter the public listing by tag
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
            ->published()
            ->with(['category', 'user', 'tags'])
            ->withCount('comments')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        [$categories, $tags, $recentPosts] = $this->sidebarData();

        return view('pages.blog', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    // Public post detail page
    public function show(Post $post)
    {
        abort_unless($post->is_published, 404);

        $post->load(['category', 'user', 'tags']);
        $post->increment('views');

        [$categories, $tags, $recentPosts] = $this->sidebarData($post->id);

        return view('pages.blog-details', compact('post', 'categories', 'tags', 'recentPosts'));
    }

    private function sidebarData(?int $excludePostId = null): array
    {
        $categories = Category::withCount('posts')->get();
        $tags = Tag::all();
        $recentPosts = Post::published()
            ->when($excludePostId, fn ($query) => $query->where('id', '!=', $excludePostId))
            ->latest()
            ->take(3)
            ->get();

        return [$categories, $tags, $recentPosts];
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs-section.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'type' => 'required|in:standard,video,gallery',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(6);
        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $post = Post::create($validated);
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs-section.create', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'type' => 'required|in:standard,video,gallery',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $post->update($validated);
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully.');
    }
}
