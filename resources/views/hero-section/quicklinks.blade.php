
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quick Links</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{route('quicklinks.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gx-3">

                                <div class="mb-3">
                                    <label>CV (PDF)</label>
                                    @if($quicklinks->file_path)
                                        <div class="mb-2">
                                            <a href="{{ asset('storage/'.$quicklinks->file_path) }}" target="_blank">Current CV</a>
                                        </div>
                                    @endif
                                    <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                                    @error('pdf_file') <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Instagram</label>
                                    <input type="text" name="ig" class="form-control" value="{{ old('ig', $quicklinks->ig) }}">
                                    @error('ig') <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $quicklinks->youtube) }}">
                                    @error('youtube') <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin', $quicklinks->linkedin) }}">
                                    @error('linkedin') <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>GitHub</label>
                                    <input type="text" name="github" class="form-control" value="{{ old('github', $quicklinks->github) }}">
                                    @error('github') <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form_btn">
                                        <a href="{{ route('hero') }}" class="btn btn-secondary">Cancel</a>
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
