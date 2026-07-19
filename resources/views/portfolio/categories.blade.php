
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Portfolio Categories
                    <a href="{{route('portfolio-categories.create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div style="overflow-x: auto;">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('portfolio-categories.edit', $category) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-category-{{ $category->id }}').submit(); }">
                                        Delete
                                    </a>
                                    <form id="delete-category-{{ $category->id }}" action="{{ route('portfolio-categories.destroy', $category) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No categories yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
