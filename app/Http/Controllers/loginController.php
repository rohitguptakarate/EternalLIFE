<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    //
    public function showLogin()
    {
        return view('login/login');
    }

    public function authUser(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email|max:100',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Please enter your password.'
            ]
        );

        $emailAmin = $request->email;
        $passwordAdmin = $request->password;
        // $AuthUser = User::all();
        $RegistorEmail = User::where('email', $emailAmin)->first();
        if ($RegistorEmail) {
            $password = $RegistorEmail->password;
            if (Hash::check($passwordAdmin, $RegistorEmail->password)) {
                // Store user data in session
                session(['loggedInUser' => $RegistorEmail]);
                return redirect('/')->with('success', 'You are successfully login!');
            } else {
                return redirect('/login')->with('error', 'Invailed Email and Password');
            }
        } else {
            return redirect('/login')->with('error', 'Invailed Email and Password');
        }
    }
}