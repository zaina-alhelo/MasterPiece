@extends('Dashboard.master')

@section('title-page')
    User Details
@endsection

@section('content')
<div class="container mt-4">

    <div class="text-center mb-4">
    
        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets_land/img/profile.jpg') }}" 
             alt="Profile Picture" 
             class="rounded-circle shadow" 
             style="width: 150px; height: 150px; object-fit: cover;">
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4 shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5><i class="bi bi-person"></i> User Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number:</strong></td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Gender:</strong></td>
                                <td>{{ $user->gender ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Birthday:</strong></td>
                                <td>{{ $user->birthday ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Health Condition:</strong></td>
                                <td><span class="badge bg-info">{{ $user->user_conditions }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Daily Activity:</strong></td>
                                <td><span class="badge bg-warning">{{ $user->user_activity }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Current Weight:</strong></td>
                                <td>{{ $user->weight }} kg</td>
                            </tr>
                            <tr>
                                <td><strong>Current Height:</strong></td>
                                <td>{{ $user->height }} cm</td>
                            </tr>
                            <tr>
                                <td><strong>Registration Date:</strong></td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Last Activity:</strong></td>
                                <td>{{ $user->last_active_at ? $user->last_active_at->diffForHumans() : 'Not available' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Account Status:</strong></td>
                                <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4 shadow">
                <div class="card-header bg-success text-white text-center">
                    <h5><i class="bi bi-graph-up-arrow"></i> Health Progress</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h6 class="text-center">BMI Progress</h6>
                            <canvas id="bmiChart"></canvas>
                        </div>
                        <div class="col-md-12">
                            <h6 class="text-center">Weight Progress</h6>
                            <canvas id="weightChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
        <a href="{{ route('messages.index', ['receiver_id' => $user->id]) }}" class="btn btn-info"><i class="bi bi-envelope"></i> Contact</a>
        @if(auth()->user()->is_admin)
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
            </form>
        @endif
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // BMI Chart
    const bmiCtx = document.getElementById('bmiChart').getContext('2d');
    new Chart(bmiCtx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [
                {
                    label: 'BMI',
                    data: @json($bmis),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                },
                {
                    label: 'الحد الأدنى الصحي',
                    data: Array(@json(count($dates))).fill(18.5),
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 1,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0
                },
                {
                    label: 'الحد الأعلى الصحي',
                    data: Array(@json(count($dates))).fill(24.9),
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 1,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += parseFloat(context.parsed.y).toFixed(1);
                            return label;
                        }
                    }
                }
            },
            scales: {
                x: { 
                    title: { 
                        display: true, 
                        text: 'التاريخ'
                    }
                },
                y: { 
                    title: { 
                        display: true, 
                        text: 'BMI'
                    },
                    suggestedMin: 15,
                    suggestedMax: 35
                }
            }
        }
    });

    const weightCtx = document.getElementById('weightChart').getContext('2d');
    new Chart(weightCtx, {
        type: 'bar',
        data: {
            labels: @json($dates),
            datasets: [{
                label: 'الوزن (كجم)',
                data: @json($weights),
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `الوزن: ${parseFloat(context.parsed.y).toFixed(1)} كجم`;
                        }
                    }
                }
            },
            scales: {
                x: { 
                    title: { 
                        display: true, 
                        text: 'التاريخ'
                    }
                },
                y: { 
                    title: { 
                        display: true, 
                        text: 'الوزن (كجم)'
                    },
                    beginAtZero: false
                }
            }
        }
    });
</script>
@endsection