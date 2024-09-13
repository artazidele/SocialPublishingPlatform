@extends('layouts.main')

@section('title', 'Post')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('content')
<div class="">
    <div class="">
        <h1>Post</h1>
        <div>
            @if(isset($post))
                <div>
                    <h3>{{ $post->title }}</h3>
                    <h6><span onclick="window.location='/posts/user/{{ $post->username }}'">{{ $post->username }}</span></h6>
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
                        <h6><span onclick="window.location='/posts/user/{{ $comment->user->username }}'">{{ $comment->user->username }}</span></h6>
                        <p>{{ $comment->message }}</p>
                        <p>{{ $comment->created_at }}</p>
                        <button onclick="openWindow('deleteCommentDiv')">Delete</button>
                    </div>
                    <div class="hiddenDiv" id="deleteCommentDiv">
                        <h4>Do you want to delete this comment?</h4>
                        <button onclick="window.location='/posts/{{ $post->id }}/comments/destroy/{{ $comment->id }}'">Delete</button>
                        <button onclick="closeWindow('deleteCommentDiv')">Cancel</button>
                    </div>
                    @endforeach
                    <div>
                        <form action="/posts/{{ $post->id }}/comments" method="POST">
                            @csrf    
                            <div class="">
                                <label class="">Comment: </label>
                                <input placeholder="Comment*" class="@error('comment') is-invalid @enderror" type="text" name="comment" value="{{ old('comment') }}">
                                @error('comment')
                                    <p id="commentErrorP">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <input type="submit" value="Save comment">
                            </div>
                        </form>
                    </div>
                    <button onclick="window.location='/posts/edit/{{ $post->id }}'">Edit</button>
                </div>
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/posts.js') }}"></script>
</div>
@endsection