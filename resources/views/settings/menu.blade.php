<x-app-layout :assets="$assets ?? []">
    <div>

                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
{{--                                    <h4 class="card-title">{{$id !== null ? 'Update' : 'Add' }} User</h4>--}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="image">Skill Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>

                                    </form>

                                </div>
                                <div class="card-body">
                                    <div class="new-user-info">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="name">I am: <span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="" class="form-control" placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="title">Title: <span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="mobno">SubTitle: </label>
                                                <input type="text" name="phone_number" value="" class="form-control" placeholder="SubTitle" required>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label class="form-label" for="description">Description: <span class="text-danger">*</span></label>
                                                <textarea type="text" name="description" value="" class="form-control" placeholder="description" required>
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-secondary">Discard</button>
{{--                                    <button type="submit" class="btn btn-primary">{{$id !== null ? 'Update' : 'Add' }} </button>--}}

                                </div>


                            </div>
                        </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
{{--                                    <h4 class="card-title">{{$id !== null ? 'Update' : 'New' }} User Information</h4>--}}
                                </div>

                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label" for="furl">Facebook Url:</label>
                                    <input type="text" name="userProfile[facebook_url]" value="<?php echo isset($_POST['userProfile']['facebook_url']) ? $_POST['userProfile']['facebook_url'] : ''; ?>" class="form-control" id="furl" placeholder="Facebook Url">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="turl">Github Url:</label>
                                    <input type="text" name="userProfile[twitter_url]" value="<?php echo isset($_POST['userProfile']['twitter']) ? $_POST['userProfile']['twitter_url'] : ''; ?>" class="form-control" id="furl" placeholder="twitter Url">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="instaurl">Instagram Url:</label>
                                    <input type="text" name="userProfile[instagram_url]" value="<?php echo isset($_POST['userProfile']['instagram']) ? $_POST['userProfile']['instagram_url'] : ''; ?>" class="form-control" id="furl" placeholder="instagram Url">
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label" for="lurl">Linkedin Url:</label>
                                    <input type="text" name="userProfile[linkedin_url]" value="<?php echo isset($_POST['userProfile']['linkedin']) ? $_POST['userProfile']['linkedin_url'] : ''; ?>" class="form-control" id="furl" placeholder="linkedin Url">
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label" for="lurl">CV File:</label>
                                    <input type="text" name="userProfile[linkedin_url]" value="<?php echo isset($_POST['userProfile']['linkedin']) ? $_POST['userProfile']['linkedin_url'] : ''; ?>" class="form-control" id="furl" placeholder="linkedin Url">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-secondary">Discard</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
    </div>
</x-app-layout>
