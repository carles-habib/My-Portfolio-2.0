
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Project</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('storeportfolio') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3">

                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
                                    @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description">Short Description</label>
                                    <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control" required>
                                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="portfolio_description">Project Description</label>
                                    <textarea id="portfolio_description" name="portfolio_description" class="form-control" required>{{ old('portfolio_description') }}</textarea>
                                    @error('portfolio_description') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="client">Client</label>
                                    <input type="text" id="client" name="client" value="{{ old('client') }}" class="form-control" required>
                                    @error('client') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($defaultCategories as $category)
                                            <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>
                                                {{ $category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image_path">Main Image</label>
                                    <input type="file" id="image_path" name="image_path" class="form-control" accept="image/*" required>
                                    @error('image_path') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gallery">Gallery Images (optional)</label>
                                    <input type="file" id="gallery" name="gallery[]" class="form-control" accept="image/*" multiple>
                                    @error('gallery') <span class="text-danger">{{$message}}</span> @enderror
                                    @error('gallery.*') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="live_url">Live URL</label>
                                    <input type="url" id="live_url" name="live_url" value="{{ old('live_url') }}" class="form-control" required>
                                    @error('live_url') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control" required>
                                    @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="designer">Designer</label>
                                    <input type="text" id="designer" name="designer" value="{{ old('designer') }}" class="form-control" required>
                                    @error('designer') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="story">Story</label>
                                    <textarea id="story" name="story" class="form-control" required>{{ old('story') }}</textarea>
                                    @error('story') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="approach">Approach</label>
                                    <textarea id="approach" name="approach" class="form-control" required>{{ old('approach') }}</textarea>
                                    @error('approach') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form_btn">
                                        <a href="{{ route('portfolios') }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
