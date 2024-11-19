@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contact Details</h5>
                    
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $contact->name}}</h5>
                                    <p class="card-text">
                                        <strong>Created at:</strong> {{ $contact->created_at->format('d M Y') }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Email:</strong> 
                                        {{ $contact->email? $contact->email : 'No description available.' }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Subject:</strong> 
                                        {{ $contact->subject? $contact->subject : 'No description available.' }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Message:</strong> 
                                        {{ $contact->message? $contact->message : 'No description available.' }}
                                    </p>
                                

                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('contact.index') }}" class="btn btn-secondary">Back </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
