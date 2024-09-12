<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Category;
use App\Models\Post;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // ja ir categories vai keywords
        $categories = Category::all();
        return view('posts.index')->with('categories', $categories);
    }

    /**
     * Display a user post view.
     */
    public function user(): View
    {
        // ja ir categories vai keywords
        $categories = Category::all();
        return view('posts.index')->with('categories', $categories);
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

        dd('validated');
        // save post
        // save postCategories
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //
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
