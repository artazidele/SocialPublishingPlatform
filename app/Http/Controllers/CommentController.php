<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Models\Comment;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        // sanitize data
        $message = filter_var($request->comment, FILTER_SANITIZE_STRING);
        // create and save post
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->id;
        $comment->message = $message;
        $comment->save();
        // return to post page
        return redirect('/posts/'.$request->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // delete comment
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        // return to posts page
        return redirect('/posts/'.$request->id);
    }
}
