@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">الملف الشخصي</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">الملف الشخصي</li>
        </ol>    
    </div>
</div>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders rtl">
        <a class="nav-link" href="">الملف الشخصي</a>
        <a class="nav-link active" href="{{ route('messages.index') }}">الرسائل</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 shadow" style="background-color: #f8f9fa;">
                <div class="card-header text-center bg-success text-white">صورة الملف الشخصي</div>
                <div class="card-body text-center">
                    <h4 class="mt-2 mb-3">{{ $user->name }}</h4>
                    @if($user->profile_image)
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset($user->profile_image) }}" alt="صورة الملف الشخصي" style="width: 150px; height: 150px;">
                    @else
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('assets_land/img/profile.jpg')}}" alt="صورة الملف الشخصي الافتراضية" style="width: 150px; height: 150px;">
                    @endif
                    <div class="small font-italic text-muted mb-4">
                        <h5>حول</h5> 
                        <p>{{ $user->bio }}</p>
                    </div>
                    <div class="mt-4">
                        <h5>رقم الهاتف</h5>
                        <p>{{ $user->phone_number ?? 'لم يتم تحديث رقم الهاتف بعد' }}</p>
                    </div>

                    <div class="mt-4">
                        <h5>الاهتمامات</h5>
                        <p>
                            @if($user->user_interests)
                                {{ implode(', ', explode(',', $user->user_interests)) }}
                            @else
                                لم يتم تحديث الاهتمامات بعد.
                            @endif
                        </p>
                    </div>

                    <div class="mt-4">
                        <h5>الشروط الصحية</h5>
                        <p>
                            @if($user->user_conditions)
                                {{ implode(', ', explode(',', $user->user_conditions)) }}
                            @else
                                لم يتم تحديث الشروط الصحية بعد.
                            @endif
                        </p>
                    </div>

                    <div class="mt-4">
                        <h5>النشاطات</h5>
                        <p>
                            @if($user->user_activity)
                                {{ implode(', ', explode(',', $user->user_activity)) }}
                            @else
                                لم يتم تحديث النشاطات بعد.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            @if(request()->is('messages'))
                <div class="container">
                    <h2>رسائلك</h2>
                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message border-bottom mb-3 pb-2">
                                <strong>{{ $message->sender->name }} ({{ $message->sender->role }}):</strong>
                                <p>{{ $message->message_content }}</p>
                                @if($message->file_path)
                                    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">عرض المرفق</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="card mb-4 shadow">
                    <div class="card-header bg-success text-white rtl">تفاصيل الحساب</div>


                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 rtl">
                                <label class="small mb-1" for="profile_image">صورة الملف الشخصي</label>
                                <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpeg" id="profile_image" onchange="previewImage(event)">
                                <img id="imagePreview" class="mt-2" src="" alt="معاينة الصورة" style="display: none; width: 150px; height: 150px; border-radius: 50%;">
                            </div>

                            <div class="mb-3 rtl">
                                <label class="small mb-1" for="name">الاسم</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-3 rtl">
                                <label class="small mb-1" for="email">البريد الإلكتروني</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3 rtl">
                                <label class="small mb-1" for="phone_number">رقم الهاتف</label>
                                <input class="form-control" id="phone_number" type="text" name="phone_number" value="{{ $user->phone_number }}">
                            </div>
   <div class="mb-3 rtl">
                                <label class="small mb-1" for="bio">السيرة الذاتية</label>
                                <textarea class="form-control" id="bio" name="bio">{{ $user->bio }}</textarea>
                            </div>

                       <div class="mb-3 rtl">
    <label class="small mb-1" for="user_interests">الأنشطة والرياضات:</label><br>
    <input type="checkbox" id="activity1" name="user_interests[]" value="المشي" {{ in_array('المشي', explode(',', $user->user_interests ?? '')) ? 'checked' : '' }}>
    <label for="activity1">المشي</label><br>
    <input type="checkbox" id="activity2" name="user_interests[]" value="السباحة" {{ in_array('السباحة', explode(',', $user->user_interests ?? '')) ? 'checked' : '' }}>
    <label for="activity2">السباحة</label><br>
    <input type="checkbox" id="activity3" name="user_interests[]" value="الجري" {{ in_array('الجري', explode(',', $user->user_interests ?? '')) ? 'checked' : '' }}>
    <label for="activity3">الجري</label><br>
    
    <input type="checkbox" id="customActivityCheckbox">
    <label for="customActivityCheckbox">أخرى (يرجى الكتابة)</label><br>
    <input type="text" id="customActivity" name="user_interests[]" placeholder="اكتب نشاطك هنا" style="display:none;" class="form-control mt-2">
</div>

<div class="mb-3 rtl">
    <label class="small mb-1" for="user_conditions">الأمراض أو المشاكل الصحية:</label><br>
    <input type="checkbox" id="condition1" name="user_conditions[]" value="السكري" {{ in_array('السكري', explode(',', $user->user_conditions ?? '')) ? 'checked' : '' }}>
    <label for="condition1">السكري</label><br>
    <input type="checkbox" id="condition2" name="user_conditions[]" value="ارتفاع ضغط الدم" {{ in_array('ارتفاع ضغط الدم', explode(',', $user->user_conditions ?? '')) ? 'checked' : '' }}>
    <label for="condition2">ارتفاع ضغط الدم</label><br>
    <input type="checkbox" id="condition3" name="user_conditions[]" value="حساسية الطعام" {{ in_array('حساسية الطعام', explode(',', $user->user_conditions ?? '')) ? 'checked' : '' }}>
    <label for="condition3">حساسية الطعام</label><br>
    
    <input type="checkbox" id="customConditionCheckbox">
    <label for="customConditionCheckbox">أخرى (يرجى الكتابة)</label><br>
    <input type="text" id="customCondition" name="user_conditions[]" placeholder="اكتب الحالة الصحية هنا" style="display:none;" class="form-control mt-2">
</div>

<div class="mb-3 rtl">
    <label class="small mb-1" for="user_activity">النشاط اليومي:</label><br>
    <input type="checkbox" id="activity1" name="user_activity[]" value="قليل النشاط" {{ in_array('قليل النشاط', explode(',', $user->user_activity ?? '')) ? 'checked' : '' }}>
    <label for="activity1">قليل النشاط</label><br>
    <input type="checkbox" id="activity2" name="user_activity[]" value="نشاط متوسط" {{ in_array('نشاط متوسط', explode(',', $user->user_activity ?? '')) ? 'checked' : '' }}>
    <label for="activity2">نشاط متوسط</label><br>
    <input type="checkbox" id="activity3" name="user_activity[]" value="نشاط عالي" {{ in_array('نشاط عالي', explode(',', $user->user_activity ?? '')) ? 'checked' : '' }}>
    <label for="activity3">نشاط عالي</label><br>
    
</div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@include("landingPage.components.footer")


<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
</script>
<script>
    document.getElementById('customActivityCheckbox').addEventListener('change', function() {
        const customActivityInput = document.getElementById('customActivity');
        if (this.checked) {
            customActivityInput.style.display = 'block';
        } else {
            customActivityInput.style.display = 'none';
        }
    });

    document.getElementById('customConditionCheckbox').addEventListener('change', function() {
        const customConditionInput = document.getElementById('customCondition');
        if (this.checked) {
            customConditionInput.style.display = 'block';
        } else {
            customConditionInput.style.display = 'none';
        }
    });

</script>