@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit BMI for {{ $bmi->user->name }}</h5>

                    <form action="{{ route('bmi.update', $bmi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ $bmi->user_id }}">

                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="{{ $bmi->weight }}" >
                        </div>
                        
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="text" class="form-control" id="height" name="height" value="{{ $bmi->height }}" >
                        </div>

                        <div class="mb-3">
                            <label for="bmi" class="form-label">BMI</label>
                            <input type="text" class="form-control" id="bmi" name="bmi" value="{{ $bmi->bmi }}" readonly>
                        </div>

       
                        <button type="submit" class="btn btn-primary">Update BMI</button>
                        <a href="{{ route('bmi.index') }}" class="btn btn-secondary">Back to List</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
