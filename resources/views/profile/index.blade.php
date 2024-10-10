@include("landingPage.components.head")

@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Profile</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Profile</li>
        </ol>    
    </div>
</div>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link" href="">Profile</a>
        <a class="nav-link active" href="{{ route('messages.index') }}">Messages</a>
        <a class="nav-link" href="#">Security</a>
        <a class="nav-link" href="#">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">

    <div class="row">
        <div class="col-xl-4 d-flex justify-content-center">
            <!-- Profile picture card-->
            <div class="card mb-4 shadow" style="background-color: #f8f9fa;">
                <div class="card-header text-center bg-success text-white">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <h4 class="mt-2 mb-3">{{ $user->name }}</h4>
                    @if($user->profile_image)
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset($user->profile_image) }}" alt="Profile Image" style="width: 150px; height: 150px;">
                    @else
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('assets_land/img/profile.jpg')}}" alt="Default Profile Image" style="width: 150px; height: 150px;">
                    @endif
                    <div class="small font-italic text-muted mb-4">
                       <h5>About</h5> 
                       <p>{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Check if the user is on the messages page -->
            @if(request()->is('messages')) <!-- Adjust the route as needed -->
                <div class="container">
                    <h2>Your Messages</h2>

                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message border-bottom mb-3 pb-2">
                                <strong>{{ $message->sender->name }} ({{ $message->sender->role }}):</strong>
                                <p>{{ $message->message_content }}</p>
                                @if($message->file_path)
                                    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">View Attachment</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Account details card-->
                <div class="card mb-4 shadow">
                    <div class="card-header bg-success text-white">Account Details</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Profile Picture Preview -->
                            <div class="mb-3">
                                <label class="small mb-1" for="profile_image">Profile Picture</label>
                                <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpeg" id="profile_image" onchange="previewImage(event)">
                                <img id="imagePreview" class="mt-2" src="" alt="Image Preview" style="display: none; width: 150px; height: 150px; border-radius: 50%;">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required>
                            </div>

                            <!-- Form Group (Email Address) -->
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email address</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}" required>
                            </div>


                            <!-- Form Group (Bio) -->
                            <div class="mb-3">
                                <label class="small mb-1" for="bio">Bio</label>
                                <textarea class="form-control" id="bio" name="bio">{{ $user->bio }}</textarea>
                            </div>

                            <!-- Form Group (Phone Number) -->
                            <div class="mb-3">
                                <label class="small mb-1" for="phone_number">Phone Number</label>
                                <input class="form-control" id="phone_number" type="text" name="phone_number" value="{{ $user->phone_number }}">
                            </div>

                            <!-- Update Button -->
                            <div class="mb-3">
                                <button class="btn btn-success w-100" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@include("landingPage.components.footer")

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
</script>
