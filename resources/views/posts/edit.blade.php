@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('title', 'Edit Post')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('content')
@if(isset($post))
<div class="">
    <div class="container p-4">
        <h1>Edit Post</h1>
        <div>
            <form method="POST" action="/posts/edit/{{ $post->id }}" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mt-3">
                    <label class="mb-3">Categories: </label>
                    <div id="categoriesDiv">
                        @if(isset($categories))
                            <div class="categories__div">
                                @foreach ($categories as $category)
                                    <div>
                                        @if($errors->has('categories'))
                                            <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, old('categories', [])) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                        @elseif(old('categories'))
                                            <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, old('categories', [])) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                        @else
                                            <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, session('oldCategories')) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                        @endif
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
                    <input id="titleI" placeholder="Title*" class="@error('title') is-invalid @enderror form-control" type="text" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label class="">Content: </label>
                        <textarea id="contentI" class="@error('content') is-invalid @enderror form-control" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input class="btn btn-primary" type="submit" value="Save Post">
                    </div>
                </form>
                <button class="btn btn-danger mt-3" onclick="openWindow('deletePostDiv')">Delete Post</button>
                
        </div>
    </div>
    <div class="hiddenDiv position-fixed bg-white m-0 z-index-3 top-0 w-100 h-100" style="--bs-bg-opacity: .75;" id="deletePostDiv">
        <div class="d-flex justify-content-center">
            <div class="border rounded border-dark mt-5 bg-white d-flex flex-column justify-content-center p-2">
                <h4 class="p-4">Do you want to delete this post?</h4>
                <div class="d-flex flex-row justify-content-center">
                    <button class="btn btn-danger m-2" onclick="window.location='/posts/destroy/{{ $post->id }}'">Delete</button>
                    <button class="btn btn-primary m-2" onclick="closeWindow('deletePostDiv')">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/posts.js') }}"></script>
    @once
    <!-- @push('scripts') -->
    <!-- <script src="{{ URL::asset('js/editpost.js') }}"></script> -->
    <!-- @endpush -->
    @endonce
</div>
@endif

    
@endsection