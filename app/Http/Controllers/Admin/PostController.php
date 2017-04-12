<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductAltered;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function update(Request $request,$type = 'page',$id){
        $post = new Post('','',$type);
        if($id != 'add'){
            $post = Post::find($id);
        }

        return '';
    }

    public function create(Request $request,$type = 'page',$id){
        $data = [
            'post' => new Post('','',$type),
            'type' => $type
        ];

        if($id !== 'add') {
            $data['post'] = Product::find($id);
        }

        return view('admin.posts.post-create',$data);
    }

    public function getPosts(Request $request,$type = 'page'){
        if($type == null) {
            $posts = Product::all();
            return view('admin.posts.post-list', ['posts' => $posts]);
        }
    }
}
