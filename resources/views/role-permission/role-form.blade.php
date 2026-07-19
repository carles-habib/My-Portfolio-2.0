
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($role) ? 'Edit' : 'Add' }} Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('role.update', $role) : route('role.store') }}" method="POST">
                        @csrf
                        @if(isset($role)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name ?? '') }}" required>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status" value="1" class="form-check-input" id="role-status-active"
                                    {{ old('status', isset($role) && $role->status === 'Active' ? '1' : '0') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="role-status-active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status" value="0" class="form-check-input" id="role-status-inactive"
                                    {{ old('status', isset($role) && $role->status === 'Active' ? '1' : '0') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="role-status-inactive">Inactive</label>
                            </div>
                            @error('status') <div class="text-danger">{{$message}}</div> @enderror
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
