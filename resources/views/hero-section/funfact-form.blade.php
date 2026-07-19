
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($funfact) ? 'Edit' : 'Add' }} Funfact</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($funfact) ? route('funfacts.update', $funfact) : route('funfacts.store') }}" method="POST">
                        @csrf
                        @if(isset($funfact)) @method('PUT') @endif

                        <div class="form-group">
                            <label for="no">Number</label>
                            <input type="text" class="form-control" id="no" name="no" value="{{ old('no', $funfact->no ?? '') }}" required>
                            @error('no') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="top">Top text</label>
                            <input type="text" class="form-control" id="top" name="top" value="{{ old('top', $funfact->top ?? '') }}" required>
                            @error('top') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="bottom">Bottom text</label>
                            <input type="text" class="form-control" id="bottom" name="bottom" value="{{ old('bottom', $funfact->bottom ?? '') }}" required>
                            @error('bottom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('hero') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
