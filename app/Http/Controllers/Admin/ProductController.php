<?php

namespace Claws\Http\Controllers\Admin;

use Claws\Events\ProductAltered;
use Claws\Product;
use Illuminate\Http\Request;
use Claws\Http\Controllers\Controller;
use Auth;


class ProductController extends Controller
{

	public function create(Request $request){
	    $product = new Product($request->input('name'),$request->input('description'));
	    $product->slug = uniqid();
		if($product->save()){
			broadcast(new ProductAltered($product))->toOthers();
			return $product;
		} else {
			return response($product->getErrors(),400);
		}
	}

	public function createView(Request $request,$productID = null){
        if($productID == 'add'){
            return view('admin.products.product-create',['product'=> new Product()]);
        } else {
            $product = Product::find($productID);
            return view('admin.products.product-create',['product'=> $product]);
        }
    }

    public function getProducts(Request $request,$productID = null){
	    if($productID == null){
	        $products = Product::all();
            return view('admin.products.product-list',['products'=> $products]);
        } else {
	        return Product::find($productID);
        }
    }
}
