
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>skill list
{{--                            <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>--}}
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{route('skillstore')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3">

                                <div class="mb-3">
                                    <labe>
                                        Skill
                                    </labe>
                                    <input type="text" name="name" class="form-control">
                                    @error('name') <span class="text">{{$message}}</span>
                                    @enderror
                                </div><div class="mb-3">
                                    <labe>
                                        Image
                                    </labe>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    @error('image'){{$message}}
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
