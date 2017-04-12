<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductAltered;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function create(Request $request,$type = 'page',$id){
        if($id == 'add'){
            $product = new Post('','',$type);
        } else {
            $product = Product::find();
        }



        $product->slug = uniqid();
        if($product->save()){
            broadcast(new ProductAltered($product))->toOthers();
            return $product;
        } else {
            return response($product->getErrors(),400);
        }
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
