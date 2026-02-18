
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>{{ isset($blog) ? 'Edit' : 'Create' }} Blog Post</h1>

            </div>
                <div class="card-body">
                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blog)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="name">Blog Title</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $blog->name ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ (old('category_id', $blog->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                </option>
                                                        @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @if(isset($blog) && $blog->image_url)
                                <img src="{{ $blog->image_url }}" width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="published_at">Publish Date</label>
                            <input type="date" class="form-control" id="published_at" name="published_at"
                                   value="{{ old('published_at', isset($blog) ? $blog->published_at->format('Y-m-d') : '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $blog->content ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
        </div>
        </div>
    </div>
</x-app-layout>
