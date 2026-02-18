<x-app-layout :assets="$assets ?? []">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Upload Image</div>

                                    <div class="card-body">
                                        <form  action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="image">Select Image</label>
                                                <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" id="image" name="image_path" required>
                                                @error('image_path')
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">Upload</button>
                                            <a href="{{ route('hero') }}" class="btn btn-secondary">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
