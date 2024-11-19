@extends('Dashboard.master')

@section('title-page')
Message Details
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Message from {{ $message->sender->name }}</h3>
                    <p><strong>Content:</strong> {{ $message->message_content }}</p>
                    @if($message->file_path)
                        <p>
                            <strong>Attachment:</strong>
                            <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">View Attachment</a>
                        </p>
                    @endif
                    <p><strong>Sent at:</strong> {{ $message->created_at->format('Y-m-d H:i:s') }}</p>
                    <a href="{{ route('messages.index') }}" class="btn btn-secondary">Back to Messages</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
