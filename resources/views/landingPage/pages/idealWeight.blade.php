@extends('land_page')
@section('title', 'الوزن المثالي ')

@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">احسب الوزن المثالي</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">الصفحة الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">  حساب الوزن المثالي  </li>
        </ol>
    </div>
</div>

<section>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="bmi-container text-center">
                    <h2 style="color: #E84256;">احسب الوزن المثالي</h2>
                    <form id="idealWeightForm">
                        <div class="mb-3">
                            <label for="height" class="form-label">الطول (سم)</label>
                            <input type="number" class="form-control" id="height" step="0.01" required>
                        </div>
                        <div class="mb-3 text-right">
                            <label for="gender" class="form-label">الجنس</label>
                            <select class="form-control " id="gender" required>
                                <option value="">اختر الجنس</option>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="background-color: #E84256;">احسب</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{asset('assets_land/img/ideal1.jpg')}}" class="img-fluid" alt="Ideal Weight Calculation Image">
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('idealWeightForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let height = document.getElementById('height').value; // Height in cm
        let gender = document.getElementById('gender').value;
        let idealWeight;

        if (gender === 'male') {
            idealWeight = (height - 100) - ((height - 150) / 4);
        } else if (gender === 'female') {
            idealWeight = (height - 100) - ((height - 150) / 2.5);
        } else {
            Swal.fire('يرجى تحديد الجنس!');
            return;
        }

    Swal.fire({
            title: `الوزن المثالي هو: ${idealWeight.toFixed(2)} كجم`,
            confirmButtonColor: '#E84256'
        });
    });
</script>
@endsection