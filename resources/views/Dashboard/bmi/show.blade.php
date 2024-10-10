@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">BMI Details for {{ $user->name }}</h5>
                    <div class="mb-4">
                        <strong>Weight:</strong> {{ $bmi->weight }} kg<br>
                        <strong>Height:</strong> {{ $bmi->height }} cm<br>
                        <strong>BMI:</strong> {{ number_format($bmi->bmi, 1) }}<br>
                        <strong>Status:</strong>
                        @php
                            if ($bmi->bmi < 18.5) {
                                $status = 'Underweight';
                                $color = 'text-primary';
                            } elseif ($bmi->bmi >= 18.5 && $bmi->bmi < 24.9) {
                                $status = 'Normal weight';
                                $color = 'text-success';
                            } elseif ($bmi->bmi >= 25 && $bmi->bmi < 29.9) {
                                $status = 'Overweight';
                                $color = 'text-warning';
                            } else {
                                $status = 'Obesity';
                                $color = 'text-danger';
                            }
                        @endphp
                        <span class="{{ $color }}">{{ $status }}</span>
                    </div>

                    <h5 class="card-title">BMI History</h5>
                    <canvas id="bmiChart" style="max-height: 400px;"></canvas>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('bmi.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('bmi.edit', $bmi->id) }}" class="btn btn-primary">Edit BMI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const bmiHistory = @json($bmiHistory); 
        const labels = bmiHistory.map(entry => entry.created_at.substring(0, 10)); 
        const data = bmiHistory.map(entry => entry.bmi); 

        new Chart(document.querySelector('#bmiChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'BMI History',
                    data: data,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
