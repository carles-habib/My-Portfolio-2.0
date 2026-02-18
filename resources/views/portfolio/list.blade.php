
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>skill list
                    <a href="{{url('projects.create')}}" class="btn btn-primary float-end" >Add Project</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div style="overflow-x: auto;">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>order</th>
                            <th>Name</th>
                            <th>Brief</th>
                            <th>image</th>
                            <th>Preview</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Start Date</th>
                            <th>Thumbnails</th>
                            <th>Description</th>
                            <th>Story</th>
                            <th>Approach</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{$portfolio->order}}</td>
                            <td>{{$portfolio->name}}</td>
                            <td>{{$portfolio->brief}}</td>
                            <td>{{$portfolio->image}}</td>
                            <td>{{$portfolio->preview}}</td>
                            <td>{{$portfolio->category}}</td>
                            <td>{{$portfolio->client}}</td>
                            <td>{{$portfolio->start_date}}</td>
                            <td>{{$portfolio->thumbnails}}</td>
                            <td>{{$portfolio->description}}</td>
                            <td>{{$portfolio->story}}</td>
                            <td>{{$portfolio->approach}}</td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-{{ $portfolio->id }}').submit(); }">
                                    Delete
                                </a>

                                <!-- Hidden form -->
                                <form id="delete-{{ $portfolio->id }}" action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
