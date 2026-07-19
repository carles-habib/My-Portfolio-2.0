
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($category) ? 'Edit' : 'Add' }} Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($category) ? route('portfolio-categories.update', $category) : route('portfolio-categories.store') }}" method="POST">
                        @csrf
                        @if(isset($category)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('portfolio-categories.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
