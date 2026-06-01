<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
     public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:registrations',
            'phone'      => 'nullable|string|max:20',
            'event_name' => 'required|string|max:255',
        ]);

        Registration::create($validated);

        return redirect('/register')->with('success', 'You are registered successfully!');
    }
}
