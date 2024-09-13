@extends('layouts.main')

@section('title', 'User posts')

@section('content')
<div class="">
    <div class="">
        <h1>{{ $username }} posts</h1>
        <div>
            @if(isset($posts))
                @foreach ($posts as $post)
                    <div>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <h6>Categories: </h6>
                        <ul>
                            @foreach($post->postCategories as $postCategory)
                                <li>{{ $postCategory->category->name }}</li>
                            @endforeach
                        </ul>
                        <h6>{{ sizeof($post->comments) }} comments</h6>
                        <button onclick="window.location='/posts/{{ $post->id }}'">Show more</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/indexposts.js') }}"></script>
</div>
@endsection