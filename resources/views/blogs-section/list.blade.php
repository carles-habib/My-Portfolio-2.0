
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>skill list
                    <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>image</th>
                            <th>Breadcrumb</th>
                            <th>content</th>
                            <th>Publish Date</th>
                            <th>key_points</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->category_id }}</td>
                            <td>{{ $blog->category_id }}</td>
                            <td>
                                @if($blog->image_url)
                                    <img src="{{ $blog->image_url }}" width="50" height="50" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                @if($blog->breadcrumb_url)
                                    <img src="{{ $blog->breadcrumb_url }}" width="50" height="50" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{$blog->content}}</td>
                            <td>{{$blog->published_at}}</td>
                            <td>{{$blog->key_points}}</td>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
