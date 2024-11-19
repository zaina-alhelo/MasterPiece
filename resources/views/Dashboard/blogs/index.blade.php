@extends('Dashboard.master')
@section('title-page')
Blogs
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
                        <h5 class="card-title">Blogs List</h5>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog</a>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                           <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ optional($blog->category)->category_name ?? 'N/A' }}</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{  $blog->image }}" alt="Image" width="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm">        <i class="bi bi-pencil"></i> Edit
</a>
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-warning btn-sm">    <i class="bi bi-eye"></i> Show
</a>

                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-button" data-blog-title="{{ $blog->title }}">            <i class="bi bi-trash"></i> Delete
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
            const blogTitle = this.getAttribute('data-blog-title');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete the blog "${blogTitle}". This action cannot be undone.`,
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
