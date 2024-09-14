@extends('layouts.main')

@section('title', 'Sign Up')

@section('content')
<div class="">
    <div class="">
        <h1>Sign Up</h1>
        <div>
            @isset($registration_error)
                <p>{{ $registration_error }}</p>
            @endisset
            <form method="POST" action="/users/register" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="">
                    <label class="">Email: </label>
                    <input placeholder="Email*" class="@error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="">Username: </label>
                    <input placeholder="Username*" class="@error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="">Password: </label>
                    <input placeholder="Password*" class="@error('title') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="">Confirm Password: </label>
                    <input placeholder="Confirm Password*" class="@error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" value="{{ old('confirm_password') }}">
                    @error('confirm_password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            <p>Already have an account?</p>
            <button onclick="window.location='/users/signin'">Sign In</button>
        </div>
    </div>
</div>
@endsection