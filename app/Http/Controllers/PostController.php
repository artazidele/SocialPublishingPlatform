<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Message;
use App\Http\Controllers\PostCategoryController;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // clear session data
        $request->session()->forget(['posts', 'categories', 'checkedCategories', 'searchedKeywords']);
        // return all post view
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with([
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    /**
     * Display a user post view.
     */
    public function user(Request $request): View
    {
        $username = $request->username;
        $posts = Post::where('username', '=', $username)
            ->orderBy('created_at','desc')
            ->get();
        return view('posts.user')->with([
            'posts' => $posts,
            'username' => $username,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'categories' => 'required',
        ]);
        // create and save post
        $post = new Post;
        $post->username = Auth::user()->username;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $post_id = $post->id;
        // save postCategories
        $postCategoryController = new PostCategoryController;
        $postCategoryController->store($request->categories, $post_id);
        // redirect to all posts
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): View
    {
        $post = Post::find($request->id);
        $comments = Comment::where('post_id', '=', $request->id)
            ->orderBy('created_at','desc')
            ->get();
        return view('posts.show')->with([
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {   
        $categories = Category::all();
        $post = Post::find($request->id);
        return view('posts.edit')->with([
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        // validate data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'categories' => 'required',
        ]);
        // update post
        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // destroy previous postCategories
        $postCategoryController = new PostCategoryController;
        $postCategoryController->destroy($request->id);
        // save new postCategories
        $postCategoryController->store($request->categories, $request->id);
        // redirect to all posts
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // delete post
        $post = Post::find($id);
        $post->delete();
        // return to posts page
        return redirect('/posts');
    }

    //
    public function filterAndSearch(Request $request): RedirectResponse
    {
        // clear keywords
        $request->session()->forget('keywords');
        // create keyword array
        $keywordArray = [];
        if ($request->keyword != null) {
            foreach($request->keyword as $keyword) {
                if (strlen(trim($keyword)) > 0) {
                    array_push($keywordArray, $keyword);
                }
            }
        }
        $request->session()->put('keywords', $keywordArray);
        // validate data
        $request->validate([
            'categories' => 'required',
        ]);
        // filter posts by categories
        $allPosts = Post::orderBy('created_at','desc')->get();;
        $filteredPosts = [];
        foreach($allPosts as $post) {
            foreach($request->categories as $category_id) {
                foreach($post->postCategories as $postCategory) {
                    if($category_id == $postCategory->category_id) {
                        if(!in_array($post, $filteredPosts)) {
                            array_push($filteredPosts, $post);
                            break;      
                        }
                    }
                }
            }
        }
        // search posts by keywords
        $searchedPosts = [];
        if(!empty($keywordArray)) {
            foreach($filteredPosts as $post) {
                foreach($keywordArray as $word) {
                    if (str_contains($post->title, $word) || str_contains($post->content, $word)) {
                        if(!in_array($post, $searchedPosts)) {
                            array_push($searchedPosts, $post);
                            break;      
                        }
                    }
                }
            }
        } else {
            $searchedPosts = $filteredPosts;
        }
        // save session data
        $categories = Category::all();   
        $checkedCategories = $request->categories;
        $searchedKeywords = $keywordArray;
        $request->session()->put('categories', $categories);
        $request->session()->put('posts', $searchedPosts);
        $request->session()->put('checkedCategories', $checkedCategories);
        $request->session()->put('searchedKeywords', $searchedKeywords);
        // clear keywords
        $request->session()->forget('keywords');
        // redirect to filtered post view
        return redirect('/posts/filtered/searched');
    }

    public function filteredAndSearched(): View
    {
        return view('posts.filtered');
    }
}
