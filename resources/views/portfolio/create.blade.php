
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

                        <form action="{{route('storeportfolio')}}"  method="POST" enctype="multipart/form-data">
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
                                        Project Brief
                                    </labe>
                                    <input type="text" name="portfolio_description" class="form-control">
                                    @error('portfolio_description') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Project Brief
                                    </labe>
                                    <input type="text" name="brief" class="form-control">
                                    @error('brief') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                         Client
                                    </labe>
                                    <input type="text" name="client" class="form-control">
                                    @error('client') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Category
                                    </labe>
                                    <select name="category" >
                                        @foreach($defaultCategories as $category)
                                            <option value="{{ $category }}"
                                                    @if(in_array($category, (array) old('category', $selectedCategories ?? [])))
                                                        selected
                                                @endif
                                            >
                                                {{ $category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Image
                                    </labe>
                                    <input type="file" name="image_path" class="form-control" accept="image/*">
                                    @error('image_path'){{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Thumbnails1
                                    </labe>
                                    <input type="file" name="thumbnail1" class="form-control" accept="image/*" multiple>
                                    @error('thumbnail1'){{$message}}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        thumbnail2
                                    </labe>
                                    <input type="file" name="thumbnail2" class="form-control" accept="image/*" multiple>
                                    @error('thumbnail2'){{$message}}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        thumbnail3
                                    </labe>
                                    <input type="file" name="thumbnail3" class="form-control" accept="image/*" multiple>
                                    @error('thumbnail3'){{$message}}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Live Preview
                                    </labe>
                                    <input type="url" name="preview" class="form-control">
                                    @error('preview') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Start Date
                                    </labe>
                                    <input type="date" name="start_date" class="form-control">
                                    @error('start_date') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <labe>
                                         Description
                                    </labe>
                                    <textarea type="text" name="description" class="form-control">
                                    </textarea>
                                    @error('description') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <labe>
                                        Designer
                                    </labe>
                                    <textarea type="text" name="designer" class="form-control">
                                    </textarea>
                                    @error('designer') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Story
                                    </labe>
                                    <textarea type="text" name="story" class="form-control">
                                    </textarea>
                                    @error('story') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        live url
                                    </labe>
                                    <textarea type="text" name="live_url" class="form-control">
                                    </textarea>
                                    @error('live_url') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Approach
                                    </labe>
                                    <textarea type="text" name="approach" class="form-control">
                                    </textarea>
                                    @error('approach') <span class="text">{{$message}}</span>
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
