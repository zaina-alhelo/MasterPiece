<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
//     public function index(Request $request)
// {
//     $user = Auth::user();
//     $receiver_id = $request->query('receiver_id'); 

//     $messages = Message::where(function($query) use ($user, $receiver_id) {
//         $query->where('receiver_id', $user->id)
//               ->orWhere('sender_id', $user->id);

//         if ($receiver_id) {
//             $query->where(function ($subQuery) use ($receiver_id, $user) {
//                 $subQuery->where('receiver_id', $receiver_id)
//                          ->orWhere('sender_id', $receiver_id);
//             });
//         }
//     })->get();

//     $admin = $user->role === 'admin' 
//         ? User::where('role', '!=', 'admin')->get() 
//         : User::where('role', 'admin')->get();      

//     return view($user->role === 'admin' ? 'Dashboard.messages.index' : 'landingPage.messages.index', compact('messages', 'admin','user', 'receiver_id'));
// }






public function index(Request $request)
{
    $user = Auth::user();
    $receiver_id = $request->query('receiver_id');

    $messages = Message::where(function ($query) use ($user, $receiver_id) {
        if ($receiver_id) {
            $query->where(function ($subQuery) use ($user, $receiver_id) {
                $subQuery->where('sender_id', $user->id)
                         ->where('receiver_id', $receiver_id)
                         ->orWhere(function ($innerQuery) use ($user, $receiver_id) {
                             $innerQuery->where('sender_id', $receiver_id)
                                        ->where('receiver_id', $user->id);
                         });
            });
        } else {
         
            $query->where('receiver_id', $user->id)
                  ->orWhere('sender_id', $user->id);
        }
    })->get();

    $admin = $user->role === 'admin' 
        ? User::where('role', '!=', 'admin')->get() 
        : User::where('role', 'admin')->get();

    return view($user->role === 'admin' ? 'Dashboard.messages.index' : 'landingPage.messages.index', compact('messages', 'admin', 'user', 'receiver_id'));
}


public function send(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message_content' => 'required|string|max:500',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx',
    ]);

    $sender = Auth::user();

    $message = new Message();
    $message->sender_id = $sender->id;
    $message->receiver_id = $request->receiver_id; 
    $message->message_content = $request->message_content;

    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('attachments', 'public'); 
        $message->file_path = $filePath;
    }

    $message->save();

    return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
}

















// public function send(Request $request)

// {
//     // Validate incoming request
//     $request->validate([
//         'receiver_id' => 'required|exists:users,id',
//         'message_content' => 'required|string|max:500',
//         'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
//     ]);

//     $sender = Auth::user();

//     $message = new Message();
//     $message->sender_id = $sender->id;
//     $message->receiver_id = $request->receiver_id; 
//     $message->message_content = $request->message_content;

//     if ($request->hasFile('file')) {
//         $filePath = $request->file('file')->store('attachments', 'public'); // Store in 'public/attachments'
//         $message->file_path = $filePath;
//     }

//     $message->save();

//     return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
// }




// public function send(Request $request)
// {
//     $request->validate([
//         'receiver_id' => 'required|exists:users,id',
//         'message_content' => 'required|string|max:500',
//         'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
//     ]);

//     $sender = Auth::user();

//     $message = new Message();
//     $message->sender_id = $sender->id;
//     $message->receiver_id = $request->receiver_id; 
//     $message->message_content = $request->message_content;

//     if ($request->hasFile('file')) {
//         $filePath = $request->file('file')->store('attachments', 'public'); // Store in 'public/attachments'
//         $message->file_path = $filePath;
//     }

//     $message->save();

//     if ($sender->role === 'admin') {
//         return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
//     } else {
//         return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
//     }
// }
// public function send(Request $request)
// {
//     $request->validate([
//         'receiver_id' => 'required|exists:users,id',
//         'message_content' => 'required|string|max:500',
//         'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
//     ]);

//     $sender = Auth::user();

//     // Create a new message instance
//     $message = new Message();
//     $message->sender_id = $sender->id;
//     $message->receiver_id = $request->receiver_id; 
//     $message->message_content = $request->message_content;

//     // Handle file attachment
//     if ($request->hasFile('file')) {
//         $filePath = $request->file('file')->store('attachments', 'public'); // Store in 'public/attachments'
//         $message->file_path = $filePath;
//     }

//     $message->save();

//     // Redirect after sending the message
//     return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
// }



}
