@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create User</h5>

                    <!-- User Creation Form -->
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" id="userForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control" 
                                       value="{{ old('name') }}" 
                                       >
                                @if ($errors->has('name'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control" 
                                       value="{{ old('email') }}" 
                                       >
                                @if ($errors->has('email'))
                                    <span class="text-danger"> <li><i class="bi bi-exclamation-circle"></i>  {{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" 
                                       name="password" 
                                       id="password" 
                                       class="form-control" 
                                       >
                                @if ($errors->has('password'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation" 
                                       class="form-control" 
                                       >
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="role" 
                                        id="role" 
                                        class="form-select" 
                                        >
                                    <option value="">Select Role</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                <input type="number" 
                                       name="age" 
                                       id="age" 
                                       class="form-control" 
                                       value="{{ old('age') }}" 
                                       placeholder="Enter age">
                                @if ($errors->has('age'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('age') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" 
                                        id="gender" 
                                        class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-sm-2 col-form-label">Weight (kg)</label>
                            <div class="col-sm-10">
                                <input type="number" 
                                       step="0.1" 
                                       name="weight" 
                                       id="weight" 
                                       class="form-control" 
                                       value="{{ old('weight') }}" 
                                       placeholder="Enter weight">
                                @if ($errors->has('weight'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('weight') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="height" class="col-sm-2 col-form-label">Height (cm)</label>
                            <div class="col-sm-10">
                                <input type="number" 
                                       step="0.1" 
                                       name="height" 
                                       id="height" 
                                       class="form-control" 
                                       value="{{ old('height') }}" 
                                       placeholder="Enter height">
                                @if ($errors->has('height'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('height') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" 
                                       name="phone_number" 
                                       id="phone_number" 
                                       class="form-control" 
                                       value="{{ old('phone_number') }}" 
                                       placeholder="Enter phone number">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-10">
                                <textarea name="bio" 
                                          id="bio" 
                                          class="form-control" 
                                          style="height: 100px" 
                                          placeholder="Tell us about yourself...">{{ old('bio') }}</textarea>
                                @if ($errors->has('bio'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('bio') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input type="file" 
                                       name="profile_image" 
                                       id="profile_image" 
                                       class="form-control"
                                       accept="image/jpeg,image/png,image/jpg">
                                @if ($errors->has('profile_image'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('profile_image') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
