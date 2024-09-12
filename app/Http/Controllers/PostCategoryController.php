<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PostCategory;

use DB;

class PostCategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store($categories, $post_id)
    {
        foreach($categories as $category) {
            $postCategory = new PostCategory;
            $postCategory->post_id = $post_id;
            $postCategory->category_id = $category;
            $postCategory->save();
        }
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
    public function destroy($post_id)
    {
        DB::table('post_categories')
            ->where('post_id', '=', $post_id)
            ->delete();
    }
}
