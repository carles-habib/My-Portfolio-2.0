<x-app-layout :assets="$assets ?? []">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
                <div class="card">
        <div class="container">
            <h1 class="mb-4">Image Gallery</h1>

            <a href="{{ route('images.create') }}" class="btn btn-primary mb-4">Upload New Image</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="{{  asset('storage/'.$image->image_path) }}" class="card-img-top" alt="Uploaded image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                     <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            </div>
            </div>

        </div>
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Main </h4>
                                </div>
                            </div>
                                <div class="form-group">
                                    <form action="{{ route('hero.update', $main->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="new-user-info">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="name">I am: <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="" class="form-control" placeholder="{{$main->name}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="title">Title: <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" value="" class="form-control" placeholder="{{$main->title}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="mobno">SubTitle: </label>
                                                    <input type="text" name="phone_number" value="" class="form-control" placeholder="{{$main->subtitle}}" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label class="form-label" for="description">Description: <span class="text-danger">*</span></label>
                                                    <textarea type="text" name="description" value="" class="form-control" placeholder="{{$main->desc}}" required>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Discard</button>
                                        <button type="submit" class="btn btn-primary"> Update </button>
                                    </form>
                              </div>
                            </div>
                        </div>

                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Funfacts</h4>
                                </div>

                            </div>
                            <div class="card-body">
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
                                    @foreach($funfacts as $funfact)

                                    <tr>
                                        <td>{{$funfact->no}}</td>
                                        <td>{{$funfact->top}}</td>
                                        <td>{{$funfact->bottom}}</td>
                                        <td>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                                </div>


                            </div>
                        </div>

                </div>
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Quicklinks</h4>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-boarded">
                        <thead>
                        <tr>
                            <th>CV</th>
                            <th>IG</th>
                            <th>youtube</th>
                            <th>github</th>
                            <th>linkedin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quicklinks as $quicklink)

                            <tr>
                                <td>{{$quicklink->file_path}}</td>
                                <td>{{$quicklink->ig}}</td>
                                <td>{{$quicklink->youtube}}</td>
                                <td>{{$quicklink->github}}</td>
                                <td>{{$quicklink->linkedin}}</td>
                                <td>
                                    <a href="{{ route('quicklinks.edit', $quicklink->id) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>

    </div>

</x-app-layout>
