@extends('Dashboard.master')
@section('title-page')
Messages    
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="card-title">Admin Messages</h3>
                    </div>

                    <!-- رسالة النجاح -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form لاختيار المستخدم وإرسال الرسالة -->
                    <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="receiver">Send to:</label>
                            <select id="receiver" name="receiver_id" class="form-control" onchange="updateMessages()">
                                <option value="">Select User</option> 
                                @foreach ($admin as $user)
                                    <option value="{{ $user->id }}" @if($user->id == $receiver_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message_content">Message:</label>
                            <textarea name="message_content" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">Attach a file:</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary m-3">Send</button>
                    </form>

                    <!-- عرض الرسائل -->
                    @if($receiver_id)
                        <div class="messages" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; border-radius: 5px; padding: 10px; background-color:#e9e9e9;">
                            @if($messages->isEmpty())
                                <p class="text-center">No messages yet.</p> 
                            @else
                                @foreach ($messages as $message)
                                    <div class="message mb-2" style="display:flex; flex-direction:column; padding: 10px; border-radius: 15px; margin-bottom: 10px; @if($message->sender_id == Auth::id()) background-color: #f6f9ff; align-self: flex-end; text-align:end; @else background-color: #ffffff; align-self: flex-start; text-align:start; @endif">
                                        <strong>{{ $message->sender->name }}</strong>
                                        <p>{{ $message->message_content }}</p>
                                        @if($message->file_path)
                                        <div>
                                        <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2" 
                                        style="@if($message->sender_id == Auth::id()) text-align: right; @else text-align: left; @endif">
                                        View Attachment
                                    </a>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <p class="text-center mt-4">Please select a user to view the conversation.</p> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
function updateMessages() {
    const receiverId = document.getElementById('receiver').value;
    if (receiverId) {
        window.location.href = `?receiver_id=${receiverId}`;
    }
}
</script>
