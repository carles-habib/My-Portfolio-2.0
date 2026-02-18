
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Services list
                    <a href="{{url('service.add')}}" class="btn btn-primary float-end" >Add Service</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div style="overflow-x: auto;">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>name</th>
                            <th>Image</th>
                            <th>brief</th>
                            <th>desc1</th>
                            <th>desc2</th>
                            <th>desc3</th>
                            <th>process</th>
                            <th>processdesc</th>
                            <th>objectives</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>                        @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" width="150">
                            @endif
                        </td>
                        <td>{{$service->brief}}</td>
                        <td>{{$service->desc1}}</td>
                        <td>{{$service->desc2}}</td>
                        <td>{{$service->desc3}}</td>
                        <td>{{$service->process}}</td>
                        <td>{{$service->processdesc}}</td>
                        <td>{{$service->objectives}}</td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-{{ $service->id }}').submit(); }">
                                Delete
                            </a>

                            <!-- Hidden form -->
                            <form id="delete-{{ $service->id }}" action="{{ route('service.destroy', $service->id) }}" method="POST" style="display: none;">
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
