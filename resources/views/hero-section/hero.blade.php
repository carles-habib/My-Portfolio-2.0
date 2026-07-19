<x-app-layout :assets="$assets ?? []">
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Main</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('hero.update', $main->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="name">I am: <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $main->name) }}" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="title">Title: <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ old('title', $main->title) }}" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="subtitle">SubTitle:</label>
                                    <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $main->subtitle) }}" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="description">Description: <span class="text-danger">*</span></label>
                                    <textarea id="description" name="description" class="form-control" required>{{ old('description', $main->description) }}</textarea>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Image Gallery</h4>
                        </div>
                        <a href="{{ route('images.create') }}" class="btn btn-primary">Upload New Image</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($images as $image)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/'.$image->image_path) }}" class="card-img-top" alt="Uploaded image">
                                        <div class="card-body d-flex justify-content-end">
                                            <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="mb-0">No images uploaded yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Funfacts</h4>
                        </div>
                        <a href="{{ route('funfacts.create') }}" class="btn btn-sm btn-primary">Add Funfact</a>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table table-striped table-boarded">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Top</th>
                                    <th>Bottom</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($funfacts as $funfact)
                                    <tr>
                                        <td>{{$funfact->no}}</td>
                                        <td>{{$funfact->top}}</td>
                                        <td>{{$funfact->bottom}}</td>
                                        <td>
                                            <a href="{{ route('funfacts.edit', $funfact) }}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-funfact-{{ $funfact->id }}').submit(); }">Delete</a>
                                            <form id="delete-funfact-{{ $funfact->id }}" action="{{ route('funfacts.destroy', $funfact) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No funfacts yet.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Quicklinks</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table table-striped table-boarded">
                                <thead>
                                <tr>
                                    <th>CV</th>
                                    <th>IG</th>
                                    <th>Youtube</th>
                                    <th>GitHub</th>
                                    <th>LinkedIn</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($quicklinks as $quicklink)
                                    <tr>
                                        <td>
                                            @if($quicklink->file_path)
                                                <a href="{{ asset('storage/'.$quicklink->file_path) }}" target="_blank">View CV</a>
                                            @endif
                                        </td>
                                        <td>{{$quicklink->ig}}</td>
                                        <td>{{$quicklink->youtube}}</td>
                                        <td>{{$quicklink->github}}</td>
                                        <td>{{$quicklink->linkedin}}</td>
                                        <td>
                                            <a href="{{ route('quicklinks.edit', $quicklink->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No quicklinks yet.</td>
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
