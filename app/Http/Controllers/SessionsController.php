<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => ['required'],
            'password' => ['required', 'min:6'],
        ];

        $validatedData = $request->validate($rules);

        $submitData = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($submitData)) {
            Session::regenerate();

            return to_route('home')->with('success', 'Welcome Back '.Auth::user()->name);
        }

        throw ValidationException::withMessages([
            'username' => 'No Found Credentials',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('home')->with('success', 'User Logout');
    }
}
