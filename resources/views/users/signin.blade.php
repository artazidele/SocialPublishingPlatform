@extends('layouts.main')

@section('title', 'Sign In')

@section('content')
<div class="">
    <div class="">
        <h1>Sign In</h1>
        <div>
            @isset($signin_error)
                <p>{{ $signin_error }}</p>
            @endisset
            <form method="GET" action="/users/login" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="">
                    <label class="">Email: </label>
                    <input placeholder="Email*" class="@error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
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
                    <input type="submit" value="Sign In">
                </div>
            </form>
            <p>Do not have an account?</p>
            <button onclick="window.location='/users/signup'">Sign Up</button>
        </div>
    </div>
</div>
@endsection