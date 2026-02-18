
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Experience
                            {{--                            <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>--}}
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{route('expstore')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3">

                                <div class="mb-3">
                                    <labe>
                                        Title
                                    </labe>
                                    <input type="text" name="title" class="form-control">
                                    @error('title') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Place
                                    </labe>
                                    <input type="text" name="place" class="form-control">
                                    @error('place') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        StartDate
                                    </labe>
                                    <input type="date" name="startDate" class="form-control">
                                    @error('startDate') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        End Date
                                    </labe>
                                    <input type="date" name="endDate" class="form-control">
                                    @error('endDate') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <br>

                                <div class="col-12">
                                    <div class="form_btn">
                                        <button class="btn btn-secondary">Discard</button>

                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Education
                            {{--                            <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>--}}
                        </h4>
                    </div>

                    <div class="card-body">


                            <form action="{{route('edustore')}}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gx-3">

                                    <div class="mb-3">
                                        <labe>
                                            Title
                                        </labe>
                                        <input type="text" name="title" class="form-control">
                                        @error('title') <span class="text">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <labe>
                                            Place
                                        </labe>
                                        <input type="text" name="place" class="form-control">
                                        @error('place') <span class="text">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <labe>
                                            StartDate
                                        </labe>
                                        <input type="date" name="startDate" class="form-control">
                                        @error('startDate') <span class="text">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <labe>
                                            End Date
                                        </labe>
                                        <input type="date" name="endDate" class="form-control">
                                        @error('endDate') <span class="text">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <br>

                                    <div class="col-12">
                                        <div class="form_btn">
                                            <button class="btn btn-secondary">Discard</button>

                                            <button type="submit" class="btn btn-primary">Send Message</button>
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
