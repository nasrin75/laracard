<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Post\AddRequest;

class AddController extends Controller
{
    public function add(AddRequest $request){
        
        $file = $request->file('image');
        $path = $file->store('uploads', 'public');
        Post::create([
            'user_id'=> auth()->id(),
            'title' => request()->get('title'),
            'content' => request()->get('content'),
            'image' => $path,
            'publish_at' => request()->get('publishAt')
        ]);
        return response()->json(['message' => 'POST_CREATED'], 200);
    }
}
