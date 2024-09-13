<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function signup(): View
    {
        return view('users.signup');
    }

    //
    public function signin(): View
    {
        return view('users.signin');
    }

    //
    public function register(Request $request): RedirectResponse
    {
        // validate data
        $request->validate([
            'username' => 'required|unique:users,username|max:255',
            'email' => 'required|unique:users,email|max:255|email:rfc',
            'password' => 'required|max:255|min:8',
            'confirm_password' => 'required|max:255|min:8|same:password',
        ]);
        // create and save new user
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // sign in user and redirect to all post page
        if (Auth::attempt( ['email' => $user->email, 'password' => $request->password] )) {
            $request->session()->regenerate();
            return redirect('/posts');
        }
        // if user was not signed in successfully return back to signup page with error
        return back()->with('registration_error', "Registration failed.");
    }

    // 
    public function login(Request $request): RedirectResponse 
    {
        // validate data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // sign in user and redirect to all post page
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/posts');
        }
        // if user was not signed in successfully return back to signin page with error
        return back()->with('signin_error', 'Email or password is not correct.');
    }

    // logout user
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users/signin');
    } 
}
