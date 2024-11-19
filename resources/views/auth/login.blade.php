@extends('layout')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="container-fluid bg-dark py-5">
    <div class="container text-center py-5 " style="max-width: 1000px;">
        <h3 class="display-4 mb-4 mt-4 " style="color:#E84256">تسجيل الدخول</h3>
    </div>
</div>
<section class="bg-light">

    <div class="container py-5 " style="max-width: 500px;">
    
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-lg p-4 rounded-lg">
            @csrf
    <div class="mb-4 rtl">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email') }}">
        @error('email')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>
    
    <div class="mb-4 rtl">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" id="password" name="password" 
               class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>
    
            
    
            <div class="flex items-center justify-between mt-4 rtl">
              
                <button type="submit" class="btn btn-success w-100 py-2 mt-4" style="background-color: #E84256; border: none; border-radius: 25px;">{{ __('تسجيل الدخول') }}</button>
            </div>
            
              <div class="mt-4 text-center">
        <a class="text-muted mb-2">{{ __("لا تملك حساباً؟") }}</a>
        <a href="{{ route('register') }}" class="text-decoration text-danger fw-bold">
            {{ __('أنشئ حساباً') }}
        </a>
    </div>
        </form>
    </div>
</section>
@endsection
