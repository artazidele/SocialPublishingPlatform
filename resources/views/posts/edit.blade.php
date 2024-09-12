@extends('layouts.main')

@section('title', 'Edit Post')

@section('content')
<div class="">
    <div class="">
        <h1>Edit Post</h1>
        <div>
            @if(isset($post))
                <div>
                    <input id="titleP" value="{{ $post->title }}">
                    <input id="contentP" value="{{ $post->content }}">
                    <input id="postCategoriesP" value="{{ $post->postCategories }}">
                </div>
                <form method="POST" action="/posts">
                    @csrf
                    <div>
                        <label>Categories: </label>
                        <div id="categoriesDiv">
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
                        <input id="titleI" placeholder="Title*" class="@error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label class="">Content: </label>
                        <textarea id="contentI" class="@error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"></textarea>
                        @error('content')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="submit" value="Create Post">
                    </div>
                </form>
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/posts.js') }}"></script>
</div>
@endsection