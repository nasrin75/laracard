<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Post\EditRequest;

class EditController extends Controller
{
    public function edit($postID,EditRequest $request){
        $post = auth()->user()
            ->posts()
            ->where('id',$postID)
            ->first();
        if(empty($post)){
            return response()->json(['message' => 'POST_NOT_FOUND'], 400);
        }
        $file = $request->file('image');
        $path = $post->image;
        if(!empty($file)){
            $path = $file->store('uploads', 'public');
        }
        $post->update([
            'title' => data_get($data, 'title',$post->title),
            'content' => data_get($data, 'content',$post->content),
            'image' => $path,
            'publish_at' => data_get($data, 'publishAt',$post->publish_at)
        ]);
        return response()->json(['message' => 'POST_UPDATED'], 200);
    }
}
