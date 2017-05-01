<?php

namespace Claws\Http\Controllers;

use Claws\Facades\PostRegister;
use Illuminate\Http\Request;
use Claws\Post;
use View;
use Theme;
use Settings;

class SiteController extends Controller
{

    public function __construct(){
        Theme::bootTheme();
        View::addNamespace('theme',Theme::getThemePath() . '/views/');
    }

    public function serveSite(Request $request,$path){
        $post = Post::where('slug',$path)->get()->first();
        if($post != null){
            $register = PostRegister::getRegisteredPost($post->type);
            $post->meta = unserialize($post->meta);
            View::share('post', $post);
            return view("theme::{$register->template}");
        }
    }

    public function serveHome(Request $request){
        if(Settings::get('use_custom_home')){
            $post = Post::find(Settings::get('custom_home_id'));
            $register = PostRegister::getRegisteredPost($post->type);
            $post->meta = unserialize($post->meta);
            View::share('post', $post);
            return view("theme::{$register->template}");
        } else {
            $post = new Post();
            View::share('post', $post);
            return view("theme::home");
        }
    }

    public function handleStyle(Request $request, $path){
        header('Content-Type: text/css',true);
        header('Content-Length: ' . filesize(Theme::getThemePath() ."/". $path));
        readfile(Theme::getThemePath() . "/" . $path);
    }

        public function handleScript(Request $request, $path){
        header('Content-Type: application/javascript',true);
        header('Content-Length: ' . filesize(Theme::getThemePath() ."/". $path));
        readfile(Theme::getThemePath() . "/" . $path);
    }
}
