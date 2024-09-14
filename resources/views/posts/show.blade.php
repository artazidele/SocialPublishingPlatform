@extends('layouts.main')

@section('title', 'Post')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('content')
<div class="">
    <div class="container">
        <div>
            @if(isset($post))
                <div>
                    <h3 class="mt-4">{{ $post->title }}</h3>
                    <h6><span onclick="window.location='/posts/user/{{ $post->username }}'">{{ $post->username }}</span></h6>
                    <p>{{ $post->content }}</p>
                    <div class="d-flex flex-row">
                        <p class="mt-2">Categories: </p>
                        @foreach($post->postCategories as $postCategory)
                            <p class="m-2">{{ $postCategory->category->name }} </p>
                        @endforeach
                    </div>
                    <div class="border-top border-danger">
                    <h6 class="mt-4">Comments: </h6>
                    <div class="d-flex flex-column">
                    @foreach($comments as $comment)
                        @if($comment->user_id == Auth::id())
                        <div class="">
                            <div class="w-25"></div>
                            <div class="mt-2 p-2 card w-75 float-end text-end">
                                <h6><span onclick="window.location='/posts/user/{{ $comment->user->username }}'">{{ $comment->user->username }}</span></h6>
                                <p>{{ $comment->message }}</p>
                                <p>{{ $comment->created_at }}</p>
                                <a onclick="openCommentWindow('deleteCommentDiv', {{ $post->id }}, {{ $comment->id }})"><i style="font-size:48px;" class="fa fa-trash-o text-danger"></i></a>
                            </div>
                        </div>
                        @else
                        <div class="">
                            <div class="card p-2 w-75 mt-2">
                                <h6><span onclick="window.location='/posts/user/{{ $comment->user->username }}'">{{ $comment->user->username }}</span></h6>
                                <p>{{ $comment->message }}</p>
                                <p>{{ $comment->created_at }}</p>
                            </div>
                            <div class="w-25"></div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                    </div>
                    <div class="d-flex flex-column border-top border-danger mt-5 w-100">
                        <form action="/posts/{{ $post->id }}/comments" method="POST" enctype="application/x-www-form-urlencoded">
                            @csrf    
                            <div class="form-group mt-3 w-100">
                                <label class="mb-3">New comment: </label>
                                <input placeholder="Comment*" class="@error('comment') is-invalid @enderror form-control" type="text" name="comment" value="{{ old('comment') }}">
                                @error('comment')
                                    <p class="text-danger" id="commentErrorP">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save comment">
                            </div>
                        </form>
                    </div>
                    @if($post->username == Auth::user()->username)
                        <div class="border-top border-danger mt-5">
                            <button class="btn btn-primary my-5" onclick="window.location='/posts/edit/{{ $post->id }}'">Edit Post</button>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="hiddenDiv r-0 position-fixed bg-white m-0 z-index-3 top-0 w-100 h-100" style="--bs-bg-opacity: .75;" id="deleteCommentDiv">
        <div class="d-flex justify-content-center">
            <div class="border rounded border-dark mt-5 bg-white d-flex flex-column justify-content-center p-2">
                <h4 class="p-4">Do you want to delete this comment?</h4>
                    <div class="d-flex flex-row justify-content-center">
                        <button class="btn btn-danger m-2" onclick="deleteComment()">Delete</button>
                        <button class="btn btn-primary m-2" onclick="closeWindow('deleteCommentDiv')">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{ URL::asset('js/posts.js') }}"></script>
</div>
@endsection