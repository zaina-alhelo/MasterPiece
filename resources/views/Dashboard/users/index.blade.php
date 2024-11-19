@extends('Dashboard.master')
@section('title-page')
Users
@endsection
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif  
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">User List</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">New User</a>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Join Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->created_at->format('Y/m/d') }}</td>
                                <td>
                                  
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
        <i class="bi bi-pencil"></i> Edit
    </a>
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm  "> <i class="bi bi-eye"></i> Show 
</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" class="delete-form">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger btn-sm delete-button" data-user-name="{{ $user->name }}">
            <i class="bi bi-trash "></i> Delete
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const userName = this.getAttribute('data-user-name'); 
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${userName}. This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});

    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.classList.remove('show');
            successMessage.classList.add('fade');
        }
    }, 2000);
</script>
@endsection
