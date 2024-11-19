<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
'birthday' => ['nullable', 'date', 'before:today'],
        'gender' => ['nullable', 'string', 'in:male,female'],
        'weight' => ['nullable', 'numeric', 'min:1', 'max:500'],
        'height' => ['nullable', 'numeric', 'min:1', 'max:300'],
        'bio' => ['nullable', 'string', 'max:1000'],
        'phone_number' => ['nullable', 'string', 'max:20'],
    ], [
        'name.required' => 'الاسم مطلوب.',
        'name.string' => 'الاسم يجب أن يكون نصًا.',
        'name.max' => 'الاسم يجب ألا يزيد عن 255 حرفًا.',
        'email.required' => 'البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
        'email.unique' => 'البريد الإلكتروني مستخدم مسبقًا.',
        'password.required' => 'كلمة المرور مطلوبة.',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        'birthday.date' => 'تاريخ الميلاد يجب أن يكون تاريخًا صحيحًا.',
        'birthday.before' => 'تاريخ الميلاد يجب أن يكون قبل اليوم.',
        'gender.in' => 'الجنس يجب أن يكون ذكر أو أنثى.',
        'weight.numeric' => 'الوزن يجب أن يكون رقمًا.',
        'weight.min' => 'الوزن يجب أن يكون أكبر من 0.',
        'weight.max' => 'الوزن يجب ألا يزيد عن 500.',
        'height.numeric' => 'الطول يجب أن يكون رقمًا.',
        'height.min' => 'الطول يجب أن يكون أكبر من 0.',
        'height.max' => 'الطول يجب ألا يزيد عن 300.',
        'bio.max' => 'الوصف الشخصي يجب ألا يزيد عن 1000 حرف.',
        'phone_number.max' => 'رقم الهاتف يجب ألا يزيد عن 20 حرفًا.',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
'birthday' => $request->birthday,
        'gender' => $request->gender,
        'weight' => $request->weight,
        'height' => $request->height,
        'bio' => $request->bio,
        'phone_number' => $request->phone_number,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);


    }
}