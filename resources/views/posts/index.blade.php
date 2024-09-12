@extends('layouts.main')

@section('title', 'All Posts')

@section('content')
<div class="">
    <div class="">
        <h1>All Posts</h1>
        <div>
            <form>
                <div>
                    <h2>Filter</h2>
                    @if(isset($categories))
                        @foreach ($categories as $category)
                            <input class="@error('categories') is-invalid @enderror" {{ in_array($category->id, old('categories') ?? []) == true ?'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                            <label>{{ $category->name }}</label>
                        @endforeach
                    @endif
                </div>
                <div>
                    <h2>Search</h2>
                </div>
            </form>
            @if(isset($posts))
                @foreach ($posts as $post)
                    <div>
                        <h3>{{ $post->title }}</h3>
                        <h6>{{ $post->username }}</h6>
                        <p>{{ $post->content }}</p>
                        <h6>Categories: </h6>
                        <ul>
                            @foreach($post->postCategories as $postCategory)
                                <li>{{ $postCategory->category->name }}</li>
                            @endforeach
                        </ul>
                        <h6>{{ sizeof($post->comments) }} comments</h6>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection