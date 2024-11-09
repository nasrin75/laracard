<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function list(Request $request){
        $postQuery = Post::query();
        
        if(!empty(request()->get('title'))){
            $postQuery->Where('title', 'Like', '%' . request()->get('title') . '%');
        }

        $posts = $postQuery->get();
        
        return response()->json(['data' => $posts], 200);
    }
}
