@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">احسب مؤشر كتلة الجسم</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">مؤشر كتلة الجسم</li>
        </ol>
    </div>
</div>

<section>
    <div class="container my-5">
        <div class="row">
            <!-- BMI Form -->
            <div class="col-md-6 text-center">
                <div class="bmi-container text-center">
                    <h2 style="color: #E84256;">احسب مؤشر كتلة الجسم (BMI)</h2>
                    <form id="bmiForm">
                        <div class="mb-3">
                            <label for="weight" class="form-label">الوزن (كجم)</label>
                            <input type="number" class="form-control" id="weight" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">الطول (سم)</label>
                            <input type="number" class="form-control" id="height" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-success" style="background-color: #E84256;">احسب</button>
                    </form>
                </div>
            </div>
            <!-- Image next to the calculator -->
           <div class="col-md-6 d-flex justify-content-center align-items-center">
    <img src="{{asset('assets_land/img/bmi.jpg')}}" class="img-fluid" alt="BMI Calculation Image">
</div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- مكتبة SweetAlert -->

<script>
    document.getElementById('bmiForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        let weight = document.getElementById('weight').value;
        let height = document.getElementById('height').value / 100; 
        let bmi = (weight / (height * height)).toFixed(2);

        let resultText = '';
        let imageUrl = '';

        if (bmi < 18.5) {
            resultText = 'نقص الوزن';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-1.png'; 
        } else if (bmi >= 18.5 && bmi <= 24.9) {
            resultText = 'وزن طبيعي';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-2.png'; 
        } else if (bmi >= 25 && bmi <= 29.9) {
            resultText = 'زيادة الوزن';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-3.png';
        } else if (bmi >= 30 && bmi <= 34.9) {
            resultText = 'سمنة 1';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-4.png'; 
        } else if (bmi >= 35 && bmi <= 39.9) {
            resultText = 'سمنة 2';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-5.png'; 
        } else {
            resultText = 'سمنة مفرطة';
            imageUrl = 'https://draljarallah.com/wp-content/uploads/2023/04/BMI-Cal-6.png';
        }

        // عرض SweetAlert مع النتيجة والصورة
        Swal.fire({
            title: `BMI الخاص بك هو: ${bmi}`,
            text: resultText,
            imageUrl: imageUrl,
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: resultText,
            confirmButtonColor: '#E84256'
        });
    });
</script>

@include("landingPage.components.footer")
