@extends('land_page')
@section('title', 'من نحن')

@section('content')

<!-- Breadcrumb Section -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">من نحن</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">الصفحة الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">من نحن</li>
        </ol>
    </div>
</div>

<!-- About Section -->
<div class="container-fluid about py-5" style="background-color: #f4f9fb;">
    <div class="container py-5">
        <div class="row justify-content-center rtl">
            <div class="col-lg-8">
                <h5 class="text-success mb-3 text-center fw-bold"> الأخصائية</h5>
                <h1 class="mb-4 text-center display-4 text-dark"> <span class="text-success">  ربى  الحلو </span></h1>
                <p class="mb-4 text-justify" style="line-height: 1.8;">
                    أنا أخصائية تغذية متخصصة في تقديم الاستشارات الغذائية والصحية، وأؤمن بأن التغذية السليمة هي أساس الحياة الصحية. أعمل على مساعدة الأفراد في تحسين نمط حياتهم من خلال خطط غذائية مخصصة تتناسب مع احتياجاتهم الصحية، سواء كان ذلك لتحسين الصحة العامة، إنقاص الوزن، أو إدارة الأمراض المزمنة.
                </p>
                <p class="mb-4 text-justify" style="line-height: 1.8;">
                    حصلت على شهادة <span class="fw-bold">البكالوريوس</span> من <span class="fw-bold">جامعة مؤتة</span>، وأنا أخصائية في <span class="fw-bold">الغذاء المثالي في العقبة</span>. أستخدم أساليب علمية وحديثة في تقويم الاحتياجات الغذائية لكل فرد، وأركز على تقديم حلول عملية ومستدامة تساعد على الوصول إلى أهداف صحية واقعية.
                </p>
                <p class="mb-4 text-justify" style="line-height: 1.8;">
                    هدفي هو أن أكون شريكًا في رحلتك نحو صحة أفضل وحياة أكثر توازنًا. من خلال العمل معي، ستتمكن من فهم احتياجات جسمك بشكل أفضل وتبني نمط حياة غذائي يعزز طاقتك وصحتك على المدى الطويل.
                </p>
                <div class="text-center">
                    <a class="btn btn-success rounded-pill py-3 px-5 shadow-lg hover-shadow-lg" href="{{ url('/contactUs') }}">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
