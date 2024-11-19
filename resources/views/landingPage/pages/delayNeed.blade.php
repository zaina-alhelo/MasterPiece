@extends('land_page')
@section('title', 'الأحتياج اليومي للجسم  ')

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">حاسبة الاحتياجات اليومية   </h3>
    </div>
</div>
<section class="bg-light">
    <div class="container py-5">
        <h2 class="text-center" style="color: #E84256;">كيف تعمل الحاسبة؟</h2>
        <p class="text-center">
            تقوم حاسبة الاحتياجات اليومية من السعرات الحرارية بحساب السعرات اللازمة لجسمك بناءً على 
            معلومات مثل العمر، الوزن، الطول، الجنس، مستوى النشاط، والهدف الغذائي.
            استخدم هذه المعلومات لتحديد احتياجاتك اليومية وتخطيط نظامك الغذائي بشكل أفضل.
        </p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="caloric-needs-container text-center bmi-container">
                    <h2 style="color: #E84256;">احسب احتياجاتك اليومية من السعرات الحرارية</h2>
                    <form id="dailyNeedsForm">
                        <div class="mb-3">
                            <label for="age" class="form-label">العمر</label>
                            <input type="number" class="form-control text-center" id="age" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">الجنس</label>
                            <select class="form-select text-center" id="gender" required>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">الوزن (كجم)</label>
                            <input type="number" class="form-control text-center" step="0.01" id="weight" required>
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">الطول (سم)</label>
                            <input type="number" class="form-control text-center" step="0.01" id="height" required>
                        </div>
                        <div class="mb-3">
                            <label for="activity" class="form-label">مستوى النشاط</label>
                            <select class="form-select text-center" id="activity" required>
                                <option value="1.2">غير نشط (قليل أو بدون تمارين)</option>
                                <option value="1.375">نشاط خفيف (تمارين خفيفة 1-3 أيام/أسبوع)</option>
                                <option value="1.55">نشاط معتدل (تمارين معتدلة 3-5 أيام/أسبوع)</option>
                                <option value="1.725">نشاط عالي (تمارين شاقة 6-7 أيام/أسبوع)</option>
                                <option value="1.9">نشاط مكثف (عمل بدني شاق)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="goal" class="form-label">الهدف</label>
                            <select class="form-select text-center" id="goal" required>
                                <option value="maintain">الحفاظ على الوزن</option>
                                <option value="lose">فقدان الوزن</option>
                                <option value="gain">زيادة الوزن</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="background-color: #E84256;">احسب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('dailyNeedsForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const age = parseInt(document.getElementById('age').value);
        const gender = document.getElementById('gender').value;
        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value);
        const activityLevel = parseFloat(document.getElementById('activity').value);
        const goal = document.getElementById('goal').value;

        let bmr;
        if (gender === 'male') {
            bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
        } else {
            bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
        }
        let dailyCalories = bmr * activityLevel;
        if (goal === 'lose') {
            dailyCalories -= 500; 
        } else if (goal === 'gain') {
            dailyCalories += 500; 
        }

        const protein = dailyCalories * 0.25 / 4;
        const carbs = dailyCalories * 0.50 / 4;
        const fats = dailyCalories * 0.25 / 9;

   let advice = "";
if (goal === 'lose') {
    advice = `
         : لتحقيق فقدان الوزن، يُنصح بتوزيع السعرات الحرارية كالآتي
        <ul style="text-align: right; padding-right: 0;">
            <li><strong>  الإفطار :</strong>  . 25% من السعرات اليومية، يشمل بروتينات مثل البيض والشوفان لتوفير طاقة مستدامة</li>
            <li><strong>  الغداء :</strong>. 35% من السعرات اليومية، اختر بروتينات خالية من الدهون (مثل الدجاج أو السمك) مع الخضروات الخضراء</li>
            <li><strong>  العشاء :</strong>. 25% من السعرات اليومية، يُفضل أن يكون خفيفًا مع بروتينات خفيفة مثل الزبادي أو الجبن قليل الدسم</li>
            <li><strong>وجبات خفيفة:</strong> . 15% من السعرات اليومية، اختر وجبات غنية بالألياف، مثل الفواكه الطازجة أو المكسرات غير المملحة</li>
        </ul>
    `;
} else if (goal === 'maintain') {
    advice = `
      :  للحفاظ على الوزن، يُنصح بتوزيع السعرات الحرارية بالتساوي بين الوجبات الرئيسية والوجبات الخفيفة. يُفضل تناول وجبات متوازنة تحتوي على جميع المغذيات
        <ul style="text-align: right; padding-right: 0;">
            <li> . قم بتضمين بروتينات مثل اللحم الأبيض والسمك لتحافظ على كتلة العضلات</li>
            <li>. تجنب الإفراط في السكريات والأطعمة السريعة، واختر الحبوب الكاملة مثل الأرز البني والكينوا</li>
            <li> . وجبات خفيفة تتضمن الفواكه والخضروات للحفاظ على طاقة مستدامة طوال اليوم</li>
        </ul>
    `;
} else {
    advice = `
        : لزيادة الوزن، يُنصح بتناول وجبات غنية بالسعرات الحرارية ووجبات خفيفة بين الوجبات
        <ul style="text-align: right; padding-right: 0;">
            <li><strong>الإفطار:</strong>. 25% من السعرات اليومية، يمكن إضافة مكملات مثل الأفوكادو أو الحبوب لتوفير طاقة إضافية</li>
            <li><strong>الغداء:</strong> . 35% من السعرات اليومية، يشمل بروتينات غنية ودهون صحية، مثل سمك السلمون والأفوكادو</li>
            <li><strong>العشاء:</strong> . 25% من السعرات اليومية، يُفضل تناول كربوهيدرات مثل البطاطا الحلوة لزيادة السعرات</li>
            <li><strong>وجبات خفيفة:</strong> . 15% من السعرات اليومية، اجعلها وجبات ذات سعرات عالية مثل المكسرات وزبدة الفول السوداني</li>
        </ul>
    `;
}


        Swal.fire({
            title: 'احتياجاتك اليومية من السعرات',
            html: `
              <b style="color: #E84256;">تحتاج إلى ${dailyCalories.toFixed(2)}   سعر حراري يوميًا</b>  <br><br>
                ${advice}
               
            `,
            icon: 'info',
            confirmButtonText: 'موافق',
            confirmButtonColor: '#E84256',
            showCloseButton: true
        });
    });
</script>

@endsection