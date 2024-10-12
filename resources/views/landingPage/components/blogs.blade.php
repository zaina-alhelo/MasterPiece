<!-- Blogs Start -->
<div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">مقالات</h5>
            <h1 class="mb-0">اخر المقالات</h1>
        </div>
        <div class="packages-carousel owl-carousel">
            @foreach($blogs as $blog)
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset($blog->image) }}" class="img-fluid w-100 rounded-top equal-height" alt="{{ $blog->title }}">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-tag me-2"></i>{{ $blog->category->category_name }}
                        </small>
                        <small class="flex-fill text-center py-2">
                            <i class="fa fa-calendar-alt me-2"></i>{{ $blog->created_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0 mb-4">
                        <h5 class="mb-0">{{ $blog->title }}</h5>
                    </div>
                    <div class="row bg-success rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                          <a href="{{ route('landing.blogs.show', $blog->id) }}" class="btn-hover btn text-white py-2 px-4">اقرا المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blogs End -->

<style>
    .equal-height {
        height: 200px; /* يمكنك ضبط الارتفاع حسب الحاجة */
        object-fit: cover; /* تضمن أن الصورة تغطي الإطار */
    }
</style>
