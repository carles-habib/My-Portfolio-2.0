
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

    <form action="{{route('quicklinks.update')}}"  method="POST">
        @csrf
        <div class="row gx-3">

            <div class="mb-3">
                <labe>
                    CV
                </labe>
                <input type="file" name="file_path" class="form-control">
                @error('file_path') <span class="text">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <labe>
                    Instagram
                </labe>
                <input type="url" name="ig" class="form-control">
                @error('ig'){{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <labe>
                    Youtube
                </labe>
                <input type="url" name="youtube" class="form-control">
                @error('youtube'){{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <labe>
                    linkedin
                </labe>
                <input type="url" name="linkedin" class="form-control">
                @error('linkedin'){{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <labe>
                    github
                </labe>
                <input type="url" name="github" class="form-control">
                @error('github'){{$message}}
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
