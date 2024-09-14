@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('title', 'New Post')

@section('content')
<div class="container p-4">
    <div class="">
        <h1 class="">New Post</h1>
        <div>
            <form method="POST" action="/posts" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mt-3">
                    <label class="mb-3">Categories: </label>
                    <div class="">
                        @if(isset($categories))
                            <div class="categories__div">
                                @foreach ($categories as $category)
                                    <div>
                                        <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, old('categories') ?? []) == true ?'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                        <label>{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categories')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label class="">Title: </label>
                    <input placeholder="Title*" class="@error('title') is-invalid @enderror form-control" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="">Content: </label>
                    <textarea class="@error('content') is-invalid @enderror form-control" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <input class="btn btn-primary" type="submit" value="Create Post">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection