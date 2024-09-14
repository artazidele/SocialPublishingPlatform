@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" />
@endpush

@section('title', 'Posts')

@section('content')
<div class="container">
    <div class="">
        <h1 class="mt-4 mb-4 pb-4 border-bottom border-danger">Posts</h1>
        <div>
            <form class="mt-4 mb-4 pb-4 border-bottom border-danger" method="POST" action="/posts/filter/search" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mt-3">
                    <h2 class="mb-3">Filter</h2>
                    <input id="allCheckbox" class="form-check-inpu" type="checkbox" onclick="checkAll()">
                    <label>All</label>
                    @if(session('categories')!=null)
                        <div class="pb-4 mt-2 categories__div w-100 border-bottom border-danger" style="--bs-border-opacity: .25;">
                            @foreach (session('categories') as $category)
                                <div>
                                    @if($errors->has('categories'))
                                        <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, old('categories', [])) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                    @else
                                        <input class="@error('categories') is-invalid @enderror form-check-input" {{ in_array($category->id, session('checkedCategories')) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
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
                <div class="w-100 pb-4 border-bottom border-danger" style="--bs-border-opacity: .25;">
                    <h2 class="mb-3 mt-4">Search</h2>
                    <div id="keyword_div" class="form-column w-100">
                        <p class="form-label">Keywords: </p>
                        @if(!empty(session('searchedKeywords')))
                            @foreach (session('searchedKeywords') as $keyword)
                                <div class="form-group mt-3 w-100 d-flex flex-row align-items-center">
                                    <input class="form-control m-2" name="keyword[]" type="text" value="{{ $keyword }}">
                                    <span class="removeDiv">
                                        <i style="font-size:32px;" class="fa fa-trash-o text-danger m-2"></i>
                                    </span>
                                </div>
                            @endforeach
                        @else
                            <div class="form-group mt-3 w-100 d-flex flex-row align-items-center">
                                <input class="form-control m-2" name="keyword[]" type="text">
                                <span class="removeDiv">
                                    <i style="font-size:32px;" class="fa fa-trash-o text-danger m-2"></i>
                                </span>
                            </div>
                        @endif
                    </div>
                    <span class="btn btn-primary mt-2" onclick="addNewKeywordInput()">New keyword</span>
                </div>
                <div class="">
                    <input class="btn btn-primary mt-4" type="submit" value="Filter and Search">
                </div>
            </form>
            @if((session('posts')!=null))
                @foreach (session('posts') as $post)
                    <div class="card p-4 mb-4">
                        <h3>{{ $post->title }}</h3>
                        <h6><span onclick="window.location='/posts/user/{{ $post->username }}'">{{ $post->username }}</span></h6>
                        <p>{{ $post->content }}</p>
                        <div class="d-flex flex-row">
                            <p class="mt-2">Categories: </p>
                            @foreach($post->postCategories as $postCategory)
                                <p class="m-2">{{ $postCategory->category->name }} </p>
                            @endforeach
                        </div>
                        <h6>{{ sizeof($post->comments) }} comments</h6>
                        <button class="btn btn-primary w-25 mt-4" onclick="window.location='/posts/{{ $post->id }}'">Show more</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/indexposts.js') }}"></script>
</div>
@endsection