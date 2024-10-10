<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $users = User::all();
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
//    public function store(Request $request)
//     {
//         // Validate the request
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|string|min:8|confirmed',
//             'role' => 'nullable|string',
//             'age' => 'nullable|integer|min:0',
//             'gender' => 'nullable|string|in:male,female',
//             'weight' => 'nullable|numeric',
//             'height' => 'nullable|numeric',
//             'bio' => 'nullable|string',
//             'profile_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', 
//             'phone_number' => 'nullable|string|max:15',
//         ]);

//         // Create a new user instance
//         $user = new User();
//         $user->name = $request->input('name');
//         $user->email = $request->input('email');
//         $user->password = bcrypt($request->input('password')); // Encrypt the password
//         $user->role = $request->input('role', 'user'); // Default to 'user' if not set
//         $user->age = $request->input('age');
//         $user->gender = $request->input('gender');
//         $user->weight = $request->input('weight');
//         $user->height = $request->input('height');
//         $user->bio = $request->input('bio');
//         $user->phone_number = $request->input('phone_number');

//         // Handle file upload
//         if ($request->hasFile('profile_image')) {
//             $filePath = $request->file('profile_image')->store('profile_images', 'public'); // Store in public/profile_images
//             $user->profile_image = $filePath;
//         }
      
//         // Save the user to the database
//         $user->save();

//         // Redirect with a success message
//         return redirect()->route('users.index')->with('success', 'User created successfully!');
//     }



public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|string',
            'age' => 'required|integer|min:0',
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
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->weight = $request->input('weight');
        $user->height = $request->input('height');
        $user->bio = $request->input('bio');
        $user->phone_number = $request->input('phone_number');

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/profile_images/';
            $file->move($path, $filename); 
            $user->profile_image = $path . $filename; 
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}



    public function show(string $id)
    {
        //
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
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|string|max:10',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048', 
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user = User::findOrFail($id); 
        $user->update($request->all()); 

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
