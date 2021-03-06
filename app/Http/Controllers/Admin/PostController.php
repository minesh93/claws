<?php

namespace Claws\Http\Controllers\Admin;

use Claws\Facades\PostRegister;
use Claws\Post;
use Claws\Product;
use Illuminate\Http\Request;
use Claws\Http\Controllers\Controller;
use Auth;
use Theme;

class PostController extends Controller
{
    public function update(Request $request,$type = 'page',$id){

        Theme::bootTheme();

        $post = new Post('','',$type);
        $post->user_id = Auth::user()->id;

        if($id != 'add'){
            $post = Post::find($id);
        }
        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->slug = $this->createSlug($request->input('slug'),$type);

        $post->meta = $request->input('meta');
        $post->meta = serialize($post->meta);

        $post->save();
        $post->meta = unserialize($post->meta);

        return $post;
    }

    public function create(Request $request,$type = 'page',$id){

        Theme::bootTheme();

        if(!PostRegister::isRegistered($type)){
            return 'post not registered';
        }

        $data = [
            'post' => new Post('','',$type),
            'type' => PostRegister::getRegisteredPost($type),
            'meta' => json_encode(PostRegister::getMetaObject($type))
        ];

        if($id !== 'add') {
            $data['post'] = Post::find($id);
            $data['meta'] = json_encode(unserialize($data['post']->meta));
        }

        return view('admin.posts.post-create',$data);
    }

    public function slugGen(Request $request){
        return $this->createSlug($request->input('name'),$request->input('type'));
    }

    public function createSlug($text,$type){
        $register = PostRegister::getRegisteredPost($type);
        $slug = $register->urlBase . str_slug($text);
        $slug = ltrim($slug,'/');
        $slug = rtrim($slug,'/');
        return $slug;
    }

    public function getPosts(Request $request,$type = 'page'){

        Theme::bootTheme();

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
