
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($permission) ? 'Edit' : 'Add' }} Permission</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($permission) ? route('permission.update', $permission) : route('permission.store') }}" method="POST">
                        @csrf
                        @if(isset($permission)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name ?? '') }}" required>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('role.permission.list') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
