
<x-app-layout :assets="$assets ?? []">
    <form action="{{ route('skills.update', $skills) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $skills->name) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Skill Image</label>
            <input type="file" class="form-control" id="image" name="image">

            @if($skills->image)
                <div class="mt-2">
                    <small>Current Image:</small>
                    <img src="{{ Storage::url($skills->image) }}" alt="{{ $skills->name }}"
                         style="max-width: 100px; max-height: 100px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Skill</button>
    </form>
</x-app-layout>
