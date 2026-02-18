
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"> Experience</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{route('exp-edu.create')}}" class="btn btn-sm btn-primary" role="button">ADD</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <table class="table table-striped table-boareded">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Place</th>
                                    <th>StartDate</th>
                                    <th>EndDate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($experience as $exp)
                                <tr>
                                    <td>{{$exp->id}}</td>
                                    <td>{{$exp->title}}</td>
                                    <td>{{$exp->place}}</td>
                                    <td>{{$exp->startDate}}</td>
                                    <td>{{$exp->endDate}}</td>
                                    <td>

                                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-{{ $exp->id }}').submit(); }">
                                            Delete
                                        </a>

                                        <!-- Hidden form -->
                                        <form id="delete-{{ $exp->id }}" action="{{ route('experience.destroy', $exp->id) }}" method="POST" style="display: none;">
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
            <div class="col-xl-12 col-lg-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"> Education</h4>

                        </div>
                        <div class="card-action">
                            <a href="{{route('exp-edu.create')}}" class="btn btn-sm btn-primary" role="button">ADD</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="new-user-info">
                            <table class="table table-striped table-boareded">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Place</th>
                                    <th>StartDate</th>
                                    <th>EndDate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($education as $edu)
                                <tr>
                                    <td>{{$edu->id}}</td>
                                    <td>{{$edu->title}}</td>
                                    <td>{{$edu->place}}</td>
                                    <td>{{$edu->startDate}}</td>
                                    <td>{{$edu->endDate}}</td>
                                    <td>

                                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-{{ $edu->id }}').submit(); }">
                                            Delete
                                        </a>

                                        <!-- Hidden form -->
                                        <form id="delete-{{ $edu->id }}" action="{{ route('education.destroy', $edu->id) }}" method="POST" style="display: none;">
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
