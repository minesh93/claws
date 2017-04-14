<?php

namespace Claws\Http\Controllers;

use Claws\Facades\PostRegister;
use Illuminate\Http\Request;
use Claws\Post;
use View;
//use Theme;

class SiteController extends Controller
{
    public function serveSite(Request $request,$path){
        $post = Post::where('slug',$path)->get()->first();
        if($post != null){
            View::addNamespace('theme',base_path() . '/themes/' . 'lion' . '/views/');
            $register = PostRegister::getRegisteredPost($post->type);
            return view("theme::{$register->template}",['post' => $post]);
        }

    }
}
