@extends('layout')

@section('title', 'تسجيل حساب جديد')

@section('content')
<div class="container-fluid bg-dark py-5" >
    <div class="container text-center py-5 " style="max-width: 900px;">   
        <h3 class="display-4  mb-4" style="color:#E84256">إنشاء حساب جديد</h3>
    </div>
</div>
<section class="bg-light">


    <div class="container py-5" style="max-width: 500px;">
        <form method="POST" action="{{ route('register') }}" class="bg-white shadow-lg p-4 rounded-lg">
            @csrf
    
            <div class="mb-4 rtl">
                <label for="name" class="form-label text-sm font-semibold text-gray-700">{{ __('الاسم') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="أدخل اسمك" autofocus>
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4 rtl">
                <label for="email" class="form-label text-sm font-semibold text-gray-700">{{ __('البريد الإلكتروني') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="أدخل بريدك الإلكتروني" autocomplete="off">
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
    <div class="mb-4 rtl">
    <label for="birthday" class="form-label text-sm font-semibold text-gray-700">{{ __('تاريخ الميلاد') }}</label>
    <input id="birthday" type="date" name="birthday" value="{{ old('birthday') }}" class="form-control @error('birthday') is-invalid @enderror" placeholder="أدخل تاريخ ميلادك">
    @error('birthday')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>
            <div class="mb-4 rtl">
                <label for="gender" class="form-label text-sm font-semibold text-gray-700">{{ __('الجنس') }}</label>
                <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                </select>
                @error('gender')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4 rtl">
                <label for="weight" class="form-label text-sm font-semibold text-gray-700">{{ __('الوزن (كجم)') }}</label>
                <input id="weight" type="number" step="0.1" name="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror" placeholder="أدخل وزنك">
                @error('weight')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4 rtl">
                <label for="password" class="form-label text-sm font-semibold text-gray-700">{{ __('كلمة المرور') }}</label>
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="أدخل كلمة المرور">
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4 rtl">
                <label for="password_confirmation" class="form-label text-sm font-semibold text-gray-700">{{ __('تأكيد كلمة المرور') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
            </div>
    
            
            <button type="submit" class="btn btn-success w-100 py-2 mt-4" style="background-color: #E84256; border: none; border-radius: 25px;">أنشاء حساب</button>
              <div class="mt-4 text-center">
                    <a class="text-muted mb-2">{{ __("هل لديك حساب بالفعل  ؟ ") }}</ش>
        
                 <a href="{{ route('login') }}" class="text-decoration text-danger fw-bold">
            {{ __("تسجيل الدخول") }}
        </a>
            </div>
        </form>
    </div>
</section>
@endsection
