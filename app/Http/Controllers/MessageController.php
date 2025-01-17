<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.create');
    }

    public function create()
    {
        return view('message.create');
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000'
        ]);

        $message = Message::create($validatedRequest);

        return back()->with('success', 'Message envoyé : ' . $message->subject);
    }
}
