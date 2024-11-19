<?php

namespace App\Http\Controllers;

use App\Models\bmi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $users = User::where('role', 'user')->get();
        return view('Dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.users.create');

    }

    /**
     * Store a newly created resource in storage.
    */



public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|string',
            'birthday' => 'nullable|date',
            'gender' => 'required|string|in:male,female',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'bio' => 'required|string',
            'profile_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', 
            'phone_number' => 'required|string|max:15',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role', 'user');
        $user->gender = $request->input('gender');
        $user->weight = $request->input('weight');
        $user->height = $request->input('height');
        $user->bio = $request->input('bio');
        $user->phone_number = $request->input('phone_number');
        $user->birthday = $request->input('birthday');

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/profile_images/';
            $file->move($path, $filename); 
            $user->profile_image = $path . $filename; 
        }

        if ($request->has('birthday')) {
            $birthday = Carbon::parse($request->input('birthday'));
            $user->age = $birthday->age;  
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}



public function show($id) {
    $user = User::findOrFail($id);
    $bmiData = Bmi::where('user_id', $id)->orderBy('updated_at')->get();

    $dates = $bmiData->pluck('updated_at')->map(function($date) {
        return $date->format('Y-m-d');
    });

    $bmis = $bmiData->pluck('bmi');
    $weights = $bmiData->pluck('weight');

    return view('Dashboard.users.show', compact('user', 'dates', 'bmis', 'weights'));
}



  
 public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.users.edit', compact('user'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'role' => 'nullable|string|max:50',
        'birthday' => 'nullable|date',
        'gender' => 'nullable|string|max:10',
        'weight' => 'nullable|numeric',
        'height' => 'nullable|numeric',
        'bio' => 'nullable|string',
        'profile_image' => 'nullable|image|max:2048',
        'phone_number' => 'nullable|string|max:15',
    ]);

    $user = User::findOrFail($id);

    $data = $request->all();
    if ($request->has('birthday')) {
        $birthday = Carbon::parse($request->input('birthday'));
        $data['age'] = $birthday->age;
    }
    $user->update($data);

    if ($request->has('weight') && $request->has('height') && $request->input('weight') && $request->input('height')) {
        $weight = $request->input('weight');
        $height = $request->input('height');
        $heightInMeters = $height / 100;
        $bmiValue = $weight / ($heightInMeters * $heightInMeters);

        $lastBmi = Bmi::where('user_id', $user->id)->latest()->first();
        $bmiChangePercentage = null;
        if ($lastBmi) {
            $bmiChangePercentage = (($bmiValue - $lastBmi->bmi) / $lastBmi->bmi) * 100;
        }

        Bmi::create([
            'user_id' => $user->id,
            'weight' => $weight,
            'height' => $height,
            'bmi' => $bmiValue,
            'bmi_change_percentage' => $bmiChangePercentage,
        ]);
    }

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}




    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
