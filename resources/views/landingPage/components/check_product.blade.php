<!-- About Start -->
<div class="container-fluid about py-5 bg-light" style="text-align: right;">
    <div class="container py-5 bg-light">
        <div class="row g-5 align-items-center bg-light">
            <div class="col-lg-5">
                <div class="h-100">
                    <img src="{{ asset('assets_land/img/check.png')}}" class="img-fluid w-100 h-100" alt="شيّك منتجك" usemap="#image-map">

<map name="image-map">
    <area shape="rect" coords="200,400,350,450" href="{{route('product_check')}}" alt="شيّك الآن" onclick="checkProduct()" title="شيّك الآن">
</map>
                </div>
            </div>
            <div class="col-lg-7 bg-light">
                <h1 class="mb-4"> <span class="text-success">شّيك منتجك</span></h1>
                <p class="mb-4">بتصفن كتير قدام رف المنتجات و مش قادر تميز شو الصحي الك ؟</p>
                <p class="mb-4">عبي بيانات منتجك واكتشف اذا كان منتجك صحي او غير صحي</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0">هل كمية الكربوهيدرات للحصة مناسبة؟<i class="fa fa-arrow-left text-success me-2"></i></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0">هل يحتوي المنتج على نسبة دهون عالية؟<i class="fa fa-arrow-left text-success me-2"></i></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0">هل المنتج صحي ام لا؟<i class="fa fa-arrow-left text-success me-2"></i></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0">هل كمية الكربوهيدرات للحصة مناسبة؟<i class="fa fa-arrow-left text-success me-2"></i></p>
                    </div>
                </div>
                <a class="btn btn-success rounded-pill py-3 px-5 mt-2" href="{{route('product_check')}}"> ابدأ الفحص</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



<style>
area {
    cursor: pointer;
}
</style>
