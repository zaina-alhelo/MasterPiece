<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index($id): View
    {
        $user = User::findOrFail($id);
          $notification = Auth::user()->customNotifications()
        ->where('id', $user->id)
        ->whereNull('read_at')
        ->first();

    if ($notification) {
        $notification->read_at = now();
        $notification->save();
    }
        return view('profile.index', compact('user'));
    }

 public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'bio' => 'nullable|string',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'phone_number' => 'nullable|string|max:15',
        'user_interests' => 'nullable|array', 
        'user_conditions' => 'nullable|array',
        'user_activity' => 'nullable|array',
    ]);

    $user->user_interests = $request->has('user_interests') ? implode(',', $request->user_interests) : '';  
    $user->user_conditions = $request->has('user_conditions') ? implode(',', $request->user_conditions) : '';  
    $user->user_activity = $request->has('user_activity') ? implode(',', $request->user_activity) : ''; 
    $user->update($request->except('profile_image', 'user_interests', 'user_conditions', 'user_activity'));

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
public function show($id)
{
    $message = Message::findOrFail($id);

    if (!$message->read_at) {
        $message->read_at = now(); 
        $message->save(); 
    }

    return view( route('messages.index'), compact('message'));
}

}
