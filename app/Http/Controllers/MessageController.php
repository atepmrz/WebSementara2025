<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Message::create($validated);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function markAsRead($id)
    {
        $msg = Message::findOrFail($id);
        $msg->is_read = true;
        $msg->save();

        return response()->json(['success' => true]);
    }
}
