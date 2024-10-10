@extends('Dashboard.master')
@section('title-page')
Recipes
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
                        <h5 class="card-title">Recipes List</h5>
                        <a href="{{ route('recipes.create') }}" class="btn btn-primary">Add Recipe</a>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Recipe Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->recipe_name }}</td>
                                <td>{{ optional($recipe->category)->category_name }}</td> 
                                <td>
                                  <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-warring ">
                                    <i class="bi bi-pencil"></i> 
</a>
<a href="{{ route('recipes.show', $recipe->id) }}" class="text-warring ">
    <i class="bi bi-eye "></i> 
</a>

                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                            @method('DELETE')
                    <a href="#" class="text-danger delete-button" data-recipe-name="{{ $recipe->recipe_name }}">
                      <i class="bi bi-x"></i> 
                        </a>
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
            const recipeName = this.getAttribute('data-recipe-name');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${recipeName}. This action cannot be undone.`,
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
