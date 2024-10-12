

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
        <h2 class="text-center text-2xl font-bold text-[#E84256] mb-6">{{ __('Register') }}</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-700">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50" autofocus>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="age" class="block text-sm text-gray-700">{{ __('Age') }}</label>
                <input id="age" type="number" name="age" value="{{ old('age') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm text-gray-700">{{ __('Gender') }}</label>
                <select id="gender" name="gender" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-sm text-gray-700">{{ __('Weight (kg)') }}</label>
                <input id="weight" type="number" step="0.1" name="weight" value="{{ old('weight') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="height" class="block text-sm text-gray-700">{{ __('Height (cm)') }}</label>
                <input id="height" type="number" step="0.1" name="height" value="{{ old('height') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-sm text-gray-700">{{ __('Bio') }}</label>
                <textarea id="bio" name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">{{ old('bio') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-sm text-gray-700">{{ __('Phone Number') }}</label>
                <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84256] focus:ring focus:ring-[#E84256] focus:ring-opacity-50">
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button type="submit" class="bg-[#E84256] text-white px-4 py-2 rounded-md hover:bg-red-600">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
