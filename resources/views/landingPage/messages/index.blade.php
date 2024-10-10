@include("landingPage.components.head")

@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<!-- Breadcrumb Section -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Messages</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Messages</li>
        </ol>    
    </div>
</div>

<!-- Content Section -->
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link" href="{{ route('profile.index', Auth::id()) }}">Profile</a>
        <a class="nav-link active" href="{{ route('messages.index') }}">Messages</a>
        <a class="nav-link" href="#">Security</a>
        <a class="nav-link" href="#">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">

    <div class="row">
        <!-- Profile Section -->
        <div class="col-xl-4 d-flex justify-content-center">
            <div class="card mb-4 shadow">
                <div class="card-header text-center bg-success text-white">Profile Picture</div>
                <div class="card-body text-center">
                    <h4 class="mt-2 mb-3">{{ $user->name }}</h4>
                    @if($user->profile_image)
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset($user->profile_image) }}" alt="Profile Image" style="width: 150px; height: 150px;">
                    @else
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('assets_land/img/profile')}}" alt="Default Profile Image" style="width: 150px; height: 150px;">
                    @endif
                    <div class="small font-italic text-muted mb-4">
                        <h5>About</h5> 
                        <p>{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Section -->
        <div class="col-xl-8">
            <!-- Chat Container -->
            <div class="card mb-4 shadow">
                <div class="card-header bg-success text-white">Your Messages</div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto; background-color: #f9f9f9; padding: 10px;">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message mb-3" 
                                 style="display:flex; flex-direction:column; padding: 10px; border-radius: 15px; max-width: 75%; 
                                 @if($message->sender_id == Auth::id()) background-color: #d1e7dd; align-self: flex-end; text-align: right; @else background-color: #fff; align-self: flex-start; text-align: left; @endif">
                                <strong>{{ $message->sender->name }} ({{ $message->sender->role }}):</strong>
                                <p>{{ $message->message_content }}</p>
                                @if($message->file_path)
                                    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">View Attachment</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Send Message Form -->
            <div class="card mb-4 shadow">
                <div class="card-header bg-success text-white">Send a Message</div>
                <div class="card-body">
                    <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="receiver_id">Send to:</label>
                            <select name="receiver_id" class="form-control" required>
                                <option value="">Select Receiver</option>
                                @foreach($admin as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="message_content">Message:</label>
                            <textarea name="message_content" class="form-control" required placeholder="Type your message here..."></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="file">Attachment (optional):</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include("landingPage.components.footer")
