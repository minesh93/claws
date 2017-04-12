<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PostController extends Controller
{
    public function update(Request $request,$type = 'page',$id){
        $post = new Post('','',$type);
        $post->user_id = Auth::user()->id;
        if($id != 'add'){
            $post = Post::find($id);
        }

        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->slug = uniqid();

        $post->save();

        return $post;
    }

    public function create(Request $request,$type = 'page',$id){
        $data = [
            'post' => new Post('','',$type),
            'type' => $type
        ];

        if($id !== 'add') {
            $data['post'] = Post::find($id);
        }

        return view('admin.posts.post-create',$data);
    }

    public function getPosts(Request $request,$type = 'page'){
        if($type != null) {
            $posts = Post::where('type',$type)->get();
            return view('admin.posts.post-list', ['posts' => $posts,'type' =>  title_case($type)]);
        }
    }
}
