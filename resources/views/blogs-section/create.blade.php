
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>{{ isset($post) ? 'Edit' : 'Create' }} Blog Post</h1>
            </div>
                <div class="card-body">
                    <form action="{{ isset($post) ? route('blog.update', $post) : route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($post)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select class="form-control" id="tags" name="tags[]" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ isset($post) && $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                @foreach(['standard', 'video', 'gallery'] as $type)
                                    <option value="{{ $type }}" {{ (old('type', $post->type ?? 'standard') == $type) ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="video_url">Video URL (if type is video)</label>
                            <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $post->video_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="featured_image">Featured Image</label>
                            <input type="file" class="form-control-file" id="featured_image" name="featured_image">
                            @if(isset($post) && $post->featured_image_url)
                                <img src="{{ $post->featured_image_url }}" width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="8">{{ old('content', $post->content ?? '') }}</textarea>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="form-group">
                            <label for="published_at">Publish Date</label>
                            <input type="date" class="form-control" id="published_at" name="published_at"
                                   value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d') : '') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
        </div>
        </div>
    </div>
</x-app-layout>
