@extends('Dashboard.master')

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
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to Blogs</a>
                    </div>              

                    <div class="mb-3">
                        <strong>Content:</strong>
                        <p>{{ $blog->content }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Category:</strong>
                        <p>{{ $blog->category->category_name ?? 'No Category' }}</p>
                    </div>

                    <div class="mb-3">
                        @if ($blog->image)
                            <strong>Image:</strong><br>
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"  class="img-fluid img-thumbnail mb-2" style="height: 150px;">
                        @else
                            <p>No image available for this blog.</p>
                        @endif
                    </div>

                    <div class="d-flex justify-content-start">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="delete-form ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-button" data-blog-title="{{ $blog->title }}">Delete</button>
                        </form>
                    </div>
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
            const blogTitle = this.getAttribute('data-blog-title');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${blogTitle}. This action cannot be undone.`,
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
