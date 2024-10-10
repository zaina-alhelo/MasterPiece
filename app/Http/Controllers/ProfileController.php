<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index($id): View
    {
        $user = User::findOrFail($id);
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'age' => 'nullable|integer|min:0',
            // 'gender' => 'nullable|string|in:male,female',
            // 'weight' => 'nullable|numeric',
            // 'height' => 'nullable|numeric',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user->update($request->except('profile_image'));

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                $oldImagePath = public_path($user->profile_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); 
                }
            }

            $imageFile = $request->file('profile_image');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension(); 
            $path = 'uploads/profile_images/'; 
            $imageFile->move(public_path($path), $filename);
            $user->profile_image = $path . $filename; 
        }

        $user->save(); 

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
