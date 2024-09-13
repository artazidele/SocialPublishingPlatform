@extends('layouts.main')

@section('title', 'Posts')

@section('content')
<div class="">
    <div class="">
        <h1>Posts</h1>
        <div>
            <form method="POST" action="/posts/filter/search">
                @csrf
                <div>
                    <h2>Filter</h2>
                    <input id="allCheckbox" class="" type="checkbox" onclick="checkAll()">
                    <label>All</label>
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
                <div>
                    <h2>Search</h2>
                    <div id="keyword_div" class="form-column">
                        <p class="form-label">Keywords: </p>
                        @if(!empty(session('keywords')))
                            @foreach (session('keywords') as $keyword)
                                <div>
                                    <input name="keyword[]" type="text" value="{{ $keyword }}">
                                    <span class="removeDiv">&times;</span>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <input name="keyword[]" type="text">
                                <span class="removeDiv">&times;</span>
                            </div>
                        @endif
                    </div>
                    <span onclick="addNewKeywordInput()">New keyword</span>
                </div>
                <div class="">
                    <input type="submit" value="Filter and Search">
                </div>
            </form>
            @if(isset($posts))
                @foreach ($posts as $post)
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