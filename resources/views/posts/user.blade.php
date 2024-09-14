@extends('layouts.main')

@section('title', 'User posts')

@section('content')
<div class="container">
    <div class="">
        <h1 class="mt-4 pb-4 border-bottom border-danger">{{ $username }} posts</h1>
        <div>
            @if(isset($posts))
                @foreach ($posts as $post)
                    <div class="border-bottom border-danger p-4">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <div class="d-flex flex-row">
                            <p class="mt-2">Categories: </p>
                            @foreach($post->postCategories as $postCategory)
                                <p class="m-2">{{ $postCategory->category->name }} </p>
                            @endforeach
                        </div>
                        <h6>{{ sizeof($post->comments) }} comments</h6>
                        <button class="btn btn-primary" onclick="window.location='/posts/{{ $post->id }}'">Show more</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/indexposts.js') }}"></script>
</div>
@endsection