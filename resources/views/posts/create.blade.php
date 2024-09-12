@extends('layouts.main')

@section('title', 'New Post')

@section('content')
<div class="">
    <div class="">
        <h1>New Post</h1>
        <div>
            <form method="POST" action="/posts">
                @csrf
                <div>
                    <label>Categories: </label>
                    <div>
                        @if(isset($categories))
                            @foreach ($categories as $category)
                                <input class="@error('categories') is-invalid @enderror" {{ in_array($category->id, old('categories') ?? []) == true ?'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                <label>{{ $category->name }}</label>
                            @endforeach
                            @error('categories')
                                <p>{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="">
                    <label class="">Title: </label>
                    <input placeholder="Title*" class="@error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="">Content: </label>
                    <textarea class="@error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"></textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <input type="submit" value="Create Post">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection