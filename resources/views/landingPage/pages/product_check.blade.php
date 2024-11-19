@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4"> شيّك منتجك </h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">الصفحة الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">  شيّك منتجك  </li>
        </ol>
    </div>
</div>

<section   style="background-color: #f4f9fb;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <div class="bg-white rounded-lg shadow-lg p-5">
                    <form id="productForm">
                        <div class="mb-3">
                            <label for="barcode" class="form-label">الباركود   </label>
                            <input type="text" id="barcode" name="barcode" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger w-100">بحث عن المنتج</button>
                    </form>
                    <div id="result" class="mt-4 text-center font-bold hidden"></div>
                    <div id="manualInput" class="hidden mt-4">
                        <h5>إدخال المعلومات يدوياً</h5>
                        <form id="nutritionForm">
                            <div class="mb-3">
                                <label for="calories" class="form-label">السعرات الحرارية (لكل حصة)</label>
                                <input type="number" id="calories" name="calories" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="fat" class="form-label">الدهون (جرام لكل حصة)</label>
                                <input type="number" id="fat" name="fat" step="0.1" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="sugar" class="form-label">السكر (جرام لكل حصة)</label>
                                <input type="number" id="sugar" name="sugar" step="0.1" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="sodium" class="form-label">الصوديوم (ملجم لكل حصة)</label>
                                <input type="number" id="sodium" name="sodium" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="carbohydrates" class="form-label">الكربوهيدرات (جرام لكل حصة)</label>
                                <input type="number" id="carbohydrates" name="carbohydrates" step="0.1" required class="form-control">
                            </div>
                            <button type="submit" class="btn btn-danger w-100">فحص صحة المنتج</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const barcode = document.getElementById('barcode').value;

        fetch(`https://world.openfoodfacts.org/api/v0/product/${barcode}.json`)
            .then(response => response.json())
            .then(data => {
                if (data.product) {
                    const product_name = data.product.product_name || 'غير متوفر';
                    const image_url = data.product.image_url || '';
                    const ingredients_text = data.product.ingredients_text || 'غير متوفر';
                    const nutrition_grades = data.product.nutrition_grades || 'غير متوفر';

                    const healthStatus = nutrition_grades ? nutrition_grades : 'غير متوفر';

                    let healthMessage;
                    if (healthStatus === 'a') {
                        healthMessage = 'صحي';
                    } else if (healthStatus === 'b') {
                        healthMessage = 'صحي بشكل معتدل';
                    } else if (healthStatus === 'c') {
                        healthMessage = 'محايد';
                    } else {
                        healthMessage = 'غير صحي';
                    }

                    Swal.fire({
                        title: product_name,
                        html: `
                            <img src="${image_url}" alt="${product_name}" class="img-fluid mb-3" />
                            <p>الحالة الصحية: ${healthMessage}</p>
                        `,
                        icon: healthStatus === 'a' ? 'success' : healthStatus === 'b' ? 'warning' : 'error',
                        confirmButtonText: 'موافق'
                    });

                } else {
                    Swal.fire({
        title: 'عذرًا',
        text: 'لم يتم العثور على المنتج المدخل.',
        icon: 'warning',
        confirmButtonText: 'حسناً'
    });
    document.getElementById('manualInput').classList.remove('hidden');
    document.getElementById('result').classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });

document.getElementById('nutritionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const calories = parseFloat(document.getElementById('calories').value);
    const fat = parseFloat(document.getElementById('fat').value);
    const sugar = parseFloat(document.getElementById('sugar').value);
    const sodium = parseFloat(document.getElementById('sodium').value);
    const carbohydrates = parseFloat(document.getElementById('carbohydrates').value);

    const result = checkHealth(calories, fat, sugar, sodium, carbohydrates);

    Swal.fire({
        title: 'نتيجة الفحص',
        text: `النتيجة: ${result}`,
        icon: result === 'صحي' ? 'success' : result === 'صحي بشكل معتدل' ? 'warning' : 'error',
        confirmButtonText: 'موافق'
    });
});



    function checkHealth(calories, fat, sugar, sodium, carbohydrates) {
        const calorieLimit = 200;
        const fatLimit = 2.5;
        const sugarLimit = 5;
        const sodiumLimit = 500;
        const carbLimit = 30;

        let criteriaMet = 0;
        if (calories <= calorieLimit) criteriaMet++;
        if (fat <= fatLimit) criteriaMet++;
        if (sugar <= sugarLimit) criteriaMet++;
        if (sodium <= sodiumLimit) criteriaMet++;
        if (carbohydrates <= carbLimit) criteriaMet++;

        if (criteriaMet >= 4) {
            return 'صحي';
        } else if (criteriaMet == 3) {
            return 'صحي بشكل معتدل';
        } else {
            return 'غير صحي';
        }
    }
</script>

@include("landingPage.components.footer")
