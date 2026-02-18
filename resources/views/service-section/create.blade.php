
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Service
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{route('servicestore')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3">
                                <div class="mb-3">
                                    <labe>
                                         Order
                                    </labe>
                                    <input type="number" name="order" class="form-control">
                                    @error('order') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Service Name
                                    </labe>
                                    <input type="text" name="name" class="form-control">
                                    @error('name') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Brief
                                    </labe>
                                    <input type="text" name="brief" class="form-control">
                                    @error('brief') <span class="text">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Image
                                    </labe>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    @error('image'){{$message}}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Decription
                                    </labe>
                                    <textarea type="text" name="desc1" class="form-control" ></textarea>
                                    @error('desc1'){{$message}}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <labe>
                                        Decription
                                    </labe>
                                    <textarea type="text" name="desc2" class="form-control" ></textarea>
                                    @error('desc2'){{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Decription
                                    </labe>
                                    <textarea type="text" name="desc3" class="form-control" ></textarea>
                                    @error('desc3'){{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Process
                                    </labe>
                                    <input type="text" name="process" class="form-control" >
                                    @error('process'){{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Process Description
                                    </labe>
                                    <textarea type="text" name="processdesc" class="form-control" ></textarea>
                                    @error('processdesc'){{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <labe>
                                        Objective1
                                    </labe>
                                    <input type="text" name="objective1" class="form-control" required>
                                    @error('objective1'){{$message}}
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-3">
                                    <labe>
                                        Objective2
                                    </labe>
                                    <input type="text" name="objective2" class="form-control" required>
                                    @error('objective2'){{$message}}
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-3">
                                    <labe>
                                        Objective3
                                    </labe>
                                    <input type="text" name="objective3" class="form-control" required>
                                    @error('objective3'){{$message}}
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-3">
                                    <labe>
                                        Objective4
                                    </labe>
                                    <input type="text" name="objective4" class="form-control" required>
                                    @error('objective4'){{$message}}
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-3">
                                    <labe>
                                        Objective5
                                    </labe>
                                    <input type="text" name="objective5" class="form-control" required>
                                    @error('objective5'){{$message}}
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-3">
                                    <labe>
                                        Objective6
                                    </labe>
                                    <input type="text" name="objective6" class="form-control" required>
                                    @error('objective6'){{$message}}
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
