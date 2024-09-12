@extends('layouts.main')

@section('title', 'Post')

@section('content')
<div class="">
    <div class="">
        <h1>Post</h1>
        <div>
            @if(isset($post))
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
                    <h6>Comments: </h6>
                    @foreach($post->comments as $comment)
                    <div>
                        <h6>{{ $comment->user->username }}</h6>
                        <p>{{ $comment->message }}</p>
                    </div>
                    @endforeach
                    <button onclick="window.location='/posts/edit/{{ $post->id }}'">Edit</button>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection