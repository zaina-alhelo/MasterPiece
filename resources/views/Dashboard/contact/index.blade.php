@extends('Dashboard.master')
@section('title-page')
Contact
@endsection
@section('content')


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">Contacts </h5>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email}}</td> 
                                <td>
                            
</a>
<a href="{{ route('contact.show', $contact->id) }}" class="text-warring ">
    <i class="bi bi-eye "></i> 
</a>

                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                            @method('DELETE')
                            
                    <button class="text-danger delete-button">
                      <i class="bi bi-x"></i> 
                        </button>
                           </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
