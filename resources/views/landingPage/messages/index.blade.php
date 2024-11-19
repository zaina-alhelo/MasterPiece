@include("landingPage.components.head")

@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb ">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">الرسائل</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">الرسائل</li>
        </ol>    
    </div>
</div>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders rtl">
        <a class="nav-link" href="{{ route('profile.index', Auth::id()) }}">الملف الشخصي</a>
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
            <div class="card mb-4 shadow rtl">
                <div class="card-header bg-success text-white rtl">رسائلك</div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto; background-color: #f9f9f9; padding: 10px;">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message mb-3" 
                                 style="display:flex; flex-direction:column; padding: 10px; border-radius: 15px; max-width: 75%; 
                                 @if($message->sender_id == Auth::id()) background-color: #d1e7dd; align-self: flex-end; text-align: right; @else background-color: #fff; align-self: flex-start; text-align: left; @endif">
                                <strong>{{ $message->sender->name }} ({{ $message->sender->role }}):</strong>
                                <p>{{ $message->message_content }}</p>
                                @if($message->file_path)
                                    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">عرض المرفق</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow">
                <div class="card-header bg-success text-white rtl">إرسال رسالة</div>
                <div class="card-body">
                    <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 rtl">
                            <label for="receiver_id">إرسال إلى:</label>
                            <select name="receiver_id" class="form-control" required>
                                @foreach($admin as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3 rtl">
                            <label for="message_content">الرسالة:</label>
                            <textarea name="message_content" class="form-control" required placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>

                        <div class="form-group mb-3 rtl ">
                            <label for="file">مرفق (اختياري):</label>
                            <input type="file" name="file" class="form-control">
                        </div>
<div class="text-center">

    <button type="submit" class="btn btn-success ">إرسال الرسالة</button>
</div>
</form>
</div>
            </div>
        </div>
    </div>
</div>

@include("landingPage.components.footer")
