<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PostCategory;

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
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
        PostCategory::where('post_id', '=', $post_id)
            ->delete();
    }
}
