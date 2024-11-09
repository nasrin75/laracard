<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function remove($postID){
        $post = auth()->user()
            ->posts()
            ->where('id',$postID)
            ->first();
        if(empty($post)){
            return response()->json(['message' => 'POST_NOT_FOUND'], 400);
        }

        $post->delete();

        return response()->json(['message' => 'POST_DELETED'], 200);
    }
}
