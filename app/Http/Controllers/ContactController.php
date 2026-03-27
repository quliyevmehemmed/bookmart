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

    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('is_read', $request->status);
        } else {
            $query->where('is_read', '0');
        }

        $messages = $query->latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Mesaj silindi!');
    }

    public function markAsRead($id)
    {
        $message = Contact::findOrFail($id);
        $message->update(['is_read' => 1]);

        return back()->with('success', 'Mesaj oxundu olaraq işarələndi.');
    }
}
