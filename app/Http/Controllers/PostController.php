<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Category;
use App\Models\Post;
use App\Models\Message;
use App\Http\Controllers\PostCategoryController;

use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        $posts = Post::all();
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
        $categories = Category::all();
        $posts = DB::table('posts')
                ->where('username', '=', $username)
                ->get();
        return view('posts.index')->with([
            'categories' => $categories,
            'posts' => $posts,
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
        // $post->username = Auth::user->username;
        $post->username = 'user1'; // vēlāk jāizlabo
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
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
