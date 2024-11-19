@extends('Dashboard.master')

@section('title-page')
Messages
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="card-title">Chat Messages</h3>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data" class="mb-4 d-flex align-items-center">
                        @csrf
                        <select id="receiver" name="receiver_id" class="form-select me-2" onchange="updateMessages()" style="max-width: 200px;">
                            <option value="">Select User</option>
                            @foreach ($admin as $user)
                                <option value="{{ $user->id }}" @if($user->id == $receiver_id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <textarea name="message_content" class="form-control me-2" rows="1" placeholder="Type your message..." required></textarea>
                        <input type="file" name="file" class="form-control-file me-2" style="max-width: 200px;">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                    </form>

                    @if($receiver_id)
                        <div class="messages" style="max-height: 400px; overflow-y: auto; padding: 10px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                            @if($messages->isEmpty())
                                <p class="text-center">No messages yet.</p>
                            @else
                                @foreach ($messages as $message)
                                    <div class="d-flex flex-column mb-3" 
                                         style="
                                            align-items: {{ $message->sender_id == Auth::id() ? 'flex-end' : 'flex-start' }};">
                                        <div class="message p-3 rounded shadow-sm" style="max-width: 70%;background-color: {{ $message->sender_id == Auth::id() ? '#d1e7dd' : '#ffffff' }};
                                                border: 1px solid #ddd;
                                             ">
                                            <strong>{{ $message->sender->name }}</strong>
                                            <p class="mb-2">{{ $message->message_content }}</p>
                                           @if($message->file_path)
    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
        <i class="bi bi-paperclip me-1"></i> View Attachment
    </a>
@endif
                                        </div>
                                        <small class="text-muted mt-1">{{ $message->created_at->diffForHumans() }}</small>
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

document.addEventListener("DOMContentLoaded", () => {
    const messagesContainer = document.querySelector('.messages');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
});
</script>