@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")
<!-- Profile 1 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">Profile</h2>
        <p class="text-secondary text-center lead fs-4 mb-5">The Profile page is your digital hub, where you can fine-tune your experience. Here's a closer look at the settings you can expect to find in your profile page.</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-4 gy-lg-0">
      <div class="col-12 col-lg-4 col-xl-3">
        <div class="row gy-4">
          <div class="col-12">
            <div class="card widget-card border-light shadow-sm">
              <div class="card-header text-bg-primary">Welcome, Ethan Leo</div>
              <div class="card-body">
                <div class="text-center mb-3">
                  <img src="./assets/img/profile-img-1.jpg" class="img-fluid rounded-circle" alt="Luna John">
                </div>
                <h5 class="text-center mb-1">Ethan Leo</h5>
                <p class="text-center text-secondary mb-4">Project Manager</p>
                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Followers</h6>
                    <span>7,854</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Following</h6>
                    <span>5,987</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Friends</h6>
                    <span>4,620</span>
                  </li>
                </ul>
                <div class="d-grid m-0">
                  <button class="btn btn-outline-primary" type="button">Follow</button>
                </div>
              </div>
            </div>
          </div>
        
      
    @dd($user)
       
        </div>
      </div>
      <div class="col-12 col-lg-8 col-xl-9">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <ul class="nav nav-tabs" id="profileTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
              </li>
         
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">Password</button>
              </li>
            </ul>
         <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tab-content pt-4" id="profileTabContent">
                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                    <h5 class="mb-3">About</h5>
                    <p class="lead mb-3">{{ $user->bio }}</p> <!-- جلب المعلومات من قاعدة البيانات -->

                    <h5 class="mb-3">Profile</h5>
                    <div class="row g-0">
                        <!-- First Name -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">First Name</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->name }}</div> <!-- عرض الاسم من قاعدة البيانات -->
                        </div>

                        <!-- Age -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Age</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->age ?? 'N/A' }}</div> <!-- عرض العمر من قاعدة البيانات -->
                        </div>

                        <!-- Gender -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Gender</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->gender ?? 'N/A' }}</div> <!-- عرض الجنس من قاعدة البيانات -->
                        </div>

                        <!-- Weight -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Weight</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->weight ?? 'N/A' }} kg</div> <!-- عرض الوزن من قاعدة البيانات -->
                        </div>

                        <!-- Height -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Height</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->height ?? 'N/A' }} cm</div> <!-- عرض الطول من قاعدة البيانات -->
                        </div>

                        <!-- Phone -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Phone</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->phone_number ?? 'N/A' }}</div> <!-- عرض رقم الهاتف من قاعدة البيانات -->
                        </div>

                        <!-- Email -->
                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                            <div class="p-2">Email</div>
                        </div>
                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                            <div class="p-2">{{ $user->email }}</div> <!-- عرض البريد الإلكتروني من قاعدة البيانات -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
              <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Age -->
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" value="{{ old('age', $user->age) }}">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Weight -->
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" step="0.1" class="form-control" name="weight" value="{{ old('weight', $user->weight) }}">
                            @error('weight')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Height -->
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="number" step="0.1" class="form-control" name="height" value="{{ old('height', $user->height) }}">
                            @error('height')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" name="profile_image" accept="image/*">
                            @if($user->profile_image)
                                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="img-thumbnail mt-2" width="100">
                            @endif
                            @error('profile_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>              </div>

              <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                <form action="#!">
                  <div class="row gy-3 gy-xxl-4">
                    <div class="col-12">
                      <label for="currentPassword" class="form-label">Current Password</label>
                      <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="col-12">
                      <label for="newPassword" class="form-label">New Password</label>
                      <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="col-12">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@include( "landingPage.components.footer")