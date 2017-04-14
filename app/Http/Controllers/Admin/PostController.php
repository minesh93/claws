<?php

namespace Claws\Http\Controllers\Admin;

use Claws\Facades\PostRegister;
use Claws\Post;
use Claws\Product;
use Illuminate\Http\Request;
use Claws\Http\Controllers\Controller;
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
        $post->slug = $request->input('slug');

        $post->save();

        return $post;
    }

    public function create(Request $request,$type = 'page',$id){
        if(!PostRegister::isRegistered($type)){
            return 'post not registered';
        }

        $data = [
            'post' => new Post('','',$type),
            'type' => PostRegister::getRegisteredPost($type)
        ];

        if($id !== 'add') {
            $data['post'] = Post::find($id);
        }

        return view('admin.posts.post-create',$data);
    }

    public function slugGen(Request $request){
        $register =  PostRegister::getRegisteredPost($request->input('type'));
        $slug = $register->urlBase . str_slug($request->input('name'));
        $slug = ltrim($slug,'/');
        $slug = rtrim($slug,'/');
        return $slug;
    }

    public function getPosts(Request $request,$type = 'page'){
        if(!PostRegister::isRegistered($type)){
            return 'post not registered';
        }

        $postType = PostRegister::getRegisteredPost($type);

        if($type != null) {
            $posts = Post::where('type',$type)->get();
            return view('admin.posts.post-list', ['posts' => $posts,'type' =>  $postType]);
        }
    }
}
