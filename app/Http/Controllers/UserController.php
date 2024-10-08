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
    // function that returns register view
    public function signup(): View
    {
        return view('users.signup');
    }

    // function that returns sign in view
    public function signin(): View
    {
        return view('users.signin');
    }

    // function that registers new user
    public function register(Request $request): RedirectResponse
    {
        // validate data
        $request->validate([
            'username' => 'required|unique:users,username|max:255',
            'email' => 'required|unique:users,email|max:255|email:rfc',
            'new_password' => 'required|max:255|min:8',
            'confirm_password' => 'required|max:255|min:8|same:new_password',
        ]);
        // sanitize data
        $email = filter_var($request->email, FILTER_SANITIZE_STRING);
        $username = filter_var($request->username, FILTER_SANITIZE_STRING);
        $password = filter_var($request->new_password, FILTER_SANITIZE_STRING);
        // create and save new user
        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        // sign in user and redirect to all post page
        if (Auth::attempt( ['email' => $user->email, 'password' => $password] )) {
            $request->session()->regenerate();
            return redirect('/posts');
        } else {
            return back()->withErrors(['registration_error' => 'Registration failed.']);
        }
    }

    // function that signs in existing user
    public function login(Request $request): RedirectResponse 
    {
        // validate data
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required',
        ]);
        // sanitize data
        $email = filter_var($request->email, FILTER_SANITIZE_STRING);
        $password = filter_var($request->password, FILTER_SANITIZE_STRING);
        // sign in user and redirect to all post page
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/posts');
        } else {
            return back()->withErrors(['signin_error' => 'Email or password is not correct.']);
        }
    }

    // function that signs out user
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users/signin');
    } 
}
