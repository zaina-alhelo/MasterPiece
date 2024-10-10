@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add BMI for {{ $user->name }}</h5>

                    <form action="{{ route('bmi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="{{ $user->weight }}" >
                        </div>
                        
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="text" class="form-control" id="height" name="height" value="{{ $user->height }}" >
                        </div>
<!-- 
                            <div class="mb-3">
                                <label for="bmi" class="form-label">BMI</label>
                                <input type="text" class="form-control" id="bmi" name="bmi" value="{{ old('bmi') }}" readonly>
                            </div> -->

                        <button type="submit" class="btn btn-primary">Calculate BMI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
