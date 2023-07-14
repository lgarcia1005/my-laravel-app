<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return View::make('register.create');
    }

    public function store(Request $request, User $user)
    {

        $customMessages = [
            'name.min' => 'Lolololol',
            'username.unique' => 'This Shit is Taken',
        ];

        $rules = [
            'name' => ['required', 'min:5', 'max:255'],
            'username' => ['required', 'min:6', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:6'],
        ];

        $validatedData = $request->validate($rules, $customMessages);

        $submitData = [
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ];

        $created_user = $user->create($submitData);

        Auth::login($created_user);

        return to_route('home')->with('success', 'Registration Complete');
    }
}
