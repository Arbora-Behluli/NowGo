<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => ['required'],
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'], 
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','string','min:8','max:20','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','confirmed'],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9\s-]*$/', 'max:20'], 
            'birthday' => ['nullable', 'date', 'before:' . now()->subYears(16)->format('Y-m-d')],
            'city' => ['nullable', 'string', 'max:255'],
        ], [
            'name.regex' => 'The first name should only contain letters and spaces.',
            'lastname.regex' => 'The last name should only contain letters and spaces.',
            'password.regex' => 'The password can contain letters, numbers, and symbols like !@#$%^&*.',
            'phone.regex' => 'The phone number format is invalid.',
            'birthday.before' => 'You must be at least 16 years old to register.',
            'image.mimes' => 'The profile picture must be a JPG, JPEG, or PNG file.',
            'image.max' => 'The profile picture must be smaller than 2MB.',
        ]);
        $path = $request->file('image')->store('image', 'public');
        $user = User::create([
            'image' => $path,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'birthday'=>$request->birthday,
            'city'=>$request->city,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
