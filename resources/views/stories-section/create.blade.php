
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Add Story
{{--                            <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>--}}
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{route('storestory')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3">

                                <div class="mb-3">
                                    <labe>
                                        Name
                                    </labe>
                                    <input type="text" name="name" class="form-control">
                                    @error('name') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Description
                                    </labe>
                                    <input type="text" name="description" class="form-control">
                                    @error('description') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Job Title
                                    </labe>
                                    <input type="text" name="jobtitle" class="form-control">
                                    @error('jobtitle') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Company Name
                                    </labe>
                                    <input type="text" name="coname" class="form-control">
                                    @error('coname') <span class="text">{{$message}}</span>
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
