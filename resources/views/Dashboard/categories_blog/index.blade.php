@extends('Dashboard.master')
@section('title-page')
Category of Blogs
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
                        <h5 class="card-title">Category List</h5>
                        <a href="{{ route('categories_blog.create') }}" class="btn btn-primary">New Category</a>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td>
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->category_name }}" width="50" height="50" class="img-thumbnail">
                                </td>
<td>
    {{ $category->created_at ? $category->created_at->format('Y/m/d') : 'N/A' }}
</td>                                <td>
                                    <a href="{{ route('categories_blog.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('categories_blog.show', $category->id) }}" class="btn btn-primary">show</a>
                                    <form action="{{ route('categories_blog.destroy', $category->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-button" data-category-name="{{ $category->category_name }}">Delete</button>
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
   document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const categoryName = this.getAttribute('data-category-name');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${categoryName}. This action cannot be undone.`,
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

    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.classList.remove('show');
            successMessage.classList.add('fade');
        }
    }, 2000);
</script>
@endsection
