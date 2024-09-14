@extends('layouts.main')

@section('title', 'Sign In')

@section('content')
<div class="container">
    <div class="">
        <h1 class="mt-4">Sign In</h1>
        <div>
            @isset($signin_error)
                <p>{{ $signin_error }}</p>
            @endisset
            <form method="GET" action="/users/login" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mt-3">
                    <label class="form-label">Email: </label>
                    <input placeholder="Email*" class="@error('email') is-invalid @enderror form-control" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Password: </label>
                    <input placeholder="Password*" class="@error('title') is-invalid @enderror form-control" type="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <input class="btn btn-primary my-4" type="submit" value="Sign In">
                </div>
            </form>
            <p>Do not have an account?</p>
            <button class="btn btn-primary mb-4" onclick="window.location='/users/signup'">Sign Up</button>
        </div>
    </div>
</div>
@endsection