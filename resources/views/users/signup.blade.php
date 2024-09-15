@extends('layouts.main')

@section('title', 'Sign Up')

@section('content')
<div class="container">
    <div class="">
        <h1 class="mt-4">Sign Up</h1>
        <div>
            @if($errors->has('registration_error'))
                <p class="text-danger">Registration failed.</p>
            @endif
            <form method="POST" action="/users/register" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mt-3">
                    <label class="form-label">Email: </label>
                    <input placeholder="Email*" class="@error('email') is-invalid @enderror form-control" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Username: </label>
                    <input placeholder="Username*" class="@error('username') is-invalid @enderror form-control" type="text" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Password: </label>
                    <input placeholder="Password*" class="@error('new_password') is-invalid @enderror form-control" type="password" name="new_password" value="{{ old('new_password') }}">
                    @error('new_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Confirm Password: </label>
                    <input placeholder="Confirm Password*" class="@error('confirm_password') is-invalid @enderror form-control" type="password" name="confirm_password" value="{{ old('confirm_password') }}">
                    @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <input class="btn btn-primary my-4" type="submit" value="Sign Up">
                </div>
            </form>
            <p>Already have an account?</p>
            <button class="btn btn-primary mb-4" onclick="window.location='/users/signin'">Sign In</button>
        </div>
    </div>
</div>
@endsection