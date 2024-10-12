<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#D7EBD9] flex items-center justify-center min-h-screen">
    <div class="w-full sm:max-w-md p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-center text-2xl font-bold text-[#E84256] mb-6">{{ __('Log in') }}</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50" autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#E84256] shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                <button type="submit" class="bg-[#E84256] text-white px-4 py-2 rounded-md hover:bg-red-600">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">{{ __("Don't have an account?") }}</p>
            <a href="{{ route('register') }}" class="text-[#E84256] underline hover:text-red-600">{{ __('Create one') }}</a>
        </div>
    </div>
</body>
</html>
