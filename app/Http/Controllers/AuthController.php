<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_master;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('login.login_page');
    }

    public function student_login()
    {
        return view('student_login');
    }

    public function authenticate_student(Request $request)
    {
        // Server-side validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Fetching user details from the database based on role
        $user_details = Students::where('email', $request->email)->first();

        // Check if user exists and password matches
        if ($user_details && $user_details->password == md5($request->password)) {
            // Store user in session
            session(['user' => $user_details]);
            return redirect()->route('student_panel'); // Redirect based on role
        }

        // Handle login error
        return back()->withErrors(['err_msg' => 'Invalid Login Credentials']);
    }

    public function authenticate(Request $request)
    {
        // Server-side validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Fetching user details from the database based on role
        $user_details = User_master::where('email', $request->email)->first();

        // Check if user exists and password matches
        if ($user_details && $user_details->password == md5($request->password)) {
            // Store user in session
            session(['user' => $user_details]);
            return redirect()->route('admin_panel'); // Redirect based on role
        }

        // Handle login error
        return back()->withErrors(['err_msg' => 'Invalid Login Credentials']);
    }

    public function logout()
    {
        // Clear the session
        session()->forget('user');

        // Redirect to the login page
        return redirect()->route('login_page'); // Ensure 'login_page' is the name of your login route
    }
}
