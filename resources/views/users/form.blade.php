<x-app-layout :assets="$assets ?? []">
   <div>
      <?php
         $id = $id ?? null;
      ?>
      <form action="{{ isset($id) ? route('users.update', $id) : route('users.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if(isset($id)) @method('PATCH') @endif
      <div class="row">
         <div class="col-xl-3 col-lg-4">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'Update' : 'Add' }} User</h4>
                  </div>
               </div>
               <div class="card-body">
                     <div class="form-group">
                        <div class="profile-img-edit position-relative">
                        <img src="{{ $profileImage ?? asset('images/avatars/01.png')}}" alt="User-Profile" class="profile-pic rounded avatar-100">
                           <div class="upload-icone bg-primary">
                              <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                 <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                              </svg>
                              <input class="file-upload" type="file" accept="image/*" name="profile_image">
                           </div>
                        </div>
                        <div class="img-extension mt-3">
                           <div class="d-inline-block align-items-center">
                              <span>Only</span>
                              <a href="javascript:void();">.jpg</a>
                              <a href="javascript:void();">.png</a>
                              <a href="javascript:void();">.jpeg</a>
                              <span>allowed</span>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-label">Status:</label>
                        <div class="grid" style="--bs-gap: 1rem">
                            <div class="form-check g-col-6">
                                <div class="form-check">
                                    <input type="radio"
                                           name="status"
                                           value="active"
                                           class="form-check-input"
                                           id="status-active"
                                        <?php echo (old('status') === 'active') ? 'checked' : ''; ?>>
                                </div>
                                <label class="form-check-label" for="status-active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check g-col-6">
                                <div class="form-check">
                                    <input type="radio"
                                           name="status"
                                           value="pending"
                                           class="form-check-input"
                                           id="status-pending"
                                        <?php echo (old('status') === 'pending') ? 'checked' : ''; ?>>
                                </div>
                                <label class="form-check-label" for="status-pending">
                                    Pending
                                </label>
                            </div>
                            <div class="form-check g-col-6">
                                <div class="form-check">
                                    <input type="radio"
                                           name="status"
                                           value="banned"
                                           class="form-check-input"
                                           id="status-banned"
                                        <?php echo (old('status') === 'banned') ? 'checked' : ''; ?>>
                                </div>
                                <label class="form-check-label" for="status-banned">
                                    Banned
                                </label>
                            </div>
                            <div class="form-check g-col-6">
                                <form action="">
                                <input type="radio"
                                       name="status"
                                       value="inactive"
                                       class="form-check-input"
                                       id="status-inactive"
                                    <?php echo (old('status') === 'inactive') ? 'checked' : ''; ?>>
                                </form>
                                <label class="form-check-label" for="status-inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-label">User Role: <span class="text-danger">*</span></label>
                         <select name="user_role" class="form-control" placeholder="Select User Role">
                             @php
                                 $selectedRole = old('user_role', $data->user_type ?? 'user');
                             @endphp
                             @foreach(\Spatie\Permission\Models\Role::pluck('name', 'id') as $key => $role)
                                 <option value="{{ $key }}" {{ $selectedRole == $key ? 'selected' : '' }}>{{ $role }}</option>
                             @endforeach
                         </select>                     </div>
                     <div class="form-group">
                        <label class="form-label" for="furl">Facebook Url:</label>
                         <input type="text" name="userProfile[facebook_url]" value="<?php echo isset($_POST['userProfile']['facebook_url']) ? $_POST['userProfile']['facebook_url'] : ''; ?>" class="form-control" id="furl" placeholder="Facebook Url">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="turl">Twitter Url:</label>
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
               </div>
            </div>
         </div>
         <div class="col-xl-9 col-lg-8">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'Update' : 'New' }} User Information</h4>
                  </div>
                  <div class="card-action">
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">First Name: <span class="text-danger">*</span></label>
                               <input type="text" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" class="form-control" placeholder="First Name" required>                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="lname">Last Name: <span class="text-danger">*</span></label>
                               <input type="text" name="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>" class="form-control" placeholder="Last Name" required>                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add1">Street Address 1:</label>
{{--                              {{ Form::text('userProfile[street_addr_1]', old('userProfile[street_addr_1]'), ['class' => 'form-control', 'id' => 'add1', 'placeholder' => 'Enter Street Address 1']) }}--}}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add2">Street Address 2:</label>
{{--                              {{ Form::text('userProfile[street_addr_2]', old('userProfile[street_addr_2]'), ['class' => 'form-control', 'id' => 'add2', 'placeholder' => 'Enter Street Address 2']) }}--}}
                           </div>
                           <div class="form-group col-md-12">
                              <label class="form-label" for="cname">Company Name: <span class="text-danger">*</span></label>
{{--                              {{ Form::text('userProfile[company_name]', old('userProfile[company_name]'), ['class' => 'form-control', 'required', 'placeholder' => 'Company Name']) }}--}}
                           </div>
                           <div class="form-group col-sm-12">
                              <label class="form-label" id="country">Country:</label>
{{--                              {{ Form::text('userProfile[country]', old('userProfile[country]'), ['class' => 'form-control', 'id' => 'country']) }}--}}

                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="mobno">Mobile Number:</label>
                               <input type="text" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; ?>" class="form-control" placeholder="Phone Number" required>                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="altconno">Alternate Contact:</label>
{{--                              {{ Form::text('userProfile[alt_phone_number]', old('userProfile[alt_phone_number]'), ['class' => 'form-control', 'id' => 'altconno', 'placeholder' => 'Alternate Contact']) }}--}}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Email: <span class="text-danger">*</span></label>
                               <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="form-control" placeholder="Email" required>                           </div>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pno">Pin Code:</label>
{{--                              {{ Form::number('userProfile[pin_code]', old('userProfile[pin_code]'), ['class' => 'form-control', 'id' => 'pin_code','step' => 'any']) }}--}}
                           </div>
                           <div class="form-group col-md-12">
                              <label class="form-label" for="city">Town/City:</label>
{{--                              {{ Form::text('userProfile[city]', old('city'), ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'Enter City Name' ]) }}--}}
                           </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Security</h5>
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label class="form-label" for="uname">User Name: <span class="text-danger">*</span></label>
                               <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" class="form-control" required placeholder="Enter Username">                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pass">Password:</label>
                               <input type="password" name="password" class="form-control" placeholder="Password">                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="rpass">Repeat Password:</label>
                               <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password">                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{$id !== null ? 'Update' : 'Add' }} User</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</x-app-layout>
