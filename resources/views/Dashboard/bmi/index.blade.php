@extends('Dashboard.master')
@section('title-page')
BMI
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
                        <h5 class="card-title">BMI Calculations List</h5>
                    </div>              

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>BMI</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @if($user->bmiCalculations->isNotEmpty()) 
                                @php $bmi = $user->bmiCalculations->first(); @endphp
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $bmi->weight }}</td>
                                    <td>{{ $bmi->height }}</td>
                                    <td>
                                        @php
                                            $bmiValue = $bmi->bmi;
                                            if ($bmiValue < 18.5) {
                                                $status = 'Underweight';
                                                $color = 'badge bg-primary'; 
                                            } elseif ($bmiValue >= 18.5 && $bmiValue < 24.9) {
                                                $status = 'Normal weight';
                                                $color = 'badge bg-success'; 
                                            } elseif ($bmiValue >= 25 && $bmiValue < 29.9) {
                                                $status = 'Overweight';
                                                $color = 'badge bg-warning'; 
                                            } else {
                                                $status = 'Obesity';
                                                $color = 'badge bg-danger'; 
                                            }
                                        @endphp
                                        <span class="{{ $color }}">{{ $status }} ({{ number_format($bmiValue, 1) }})</span>
                                    </td>
                                    <td>    
                                        <a href="{{ route('bmi.edit', $bmi->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('bmi.show', $user->id) }}" class="btn btn-primary">show</a>
                                      
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->weight }}</td>
                                    <td>{{ $user->height }}</td>
                                    <td>No BMI</td>
                                    <td>
                                        <a href="{{ route('bmi.create', ['user_id' => $user->id]) }}" class="btn btn-primary">Add BMI</a>
                                    </td>
                                </tr>
                            @endif
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
            const userName = this.getAttribute('data-user-name'); 
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete the BMI entry for ${userName}. This action cannot be undone.`,
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
