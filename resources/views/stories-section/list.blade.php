
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Stories list
                    <a href="{{url('addstory')}}" class="btn btn-primary float-end" >Add skill</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>order</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Job Title</th>
                            <th>Company Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stories as $story)
                        <tr>
                            <td>{{$story->id}}</td>
                            <td>{{$story->name}}</td>
                            <td>{{$story->description}}</td>
                            <td>{{$story->jobtitle}}</td>
                            <td>{{$story->coname}}</td>
                            <td>

                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-skill-{{ $story->id }}').submit(); }">
                                    Delete
                                </a>

                                <!-- Hidden form -->
                                <form id="delete-skill-{{ $story->id }}" action="{{ route('story.destroy', $story->id) }}" method="POST" style="display: none;">
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
</x-app-layout>
