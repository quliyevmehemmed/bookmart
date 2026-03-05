<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
            'type'    => 'required|string',
        ]);

        Contact::create($validated + ['user_id' => auth()->id()]);

        return back()->with('success', 'Sorğunuz uğurla göndərildi!');
    }

    public function index()
    {
        $messages = Contact::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }
}
