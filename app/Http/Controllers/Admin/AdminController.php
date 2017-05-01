<?php

namespace Claws\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Claws\Http\Controllers\Controller;
use Claws\Post;
use Settings;

class AdminController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }

	public function viewSettings(Request $request){
		$posts = Post::get(['name','id']);
		$settings = Settings::get(['use_custom_home','custom_home_id','site_name']);

		$keyed = $settings->mapWithKeys(function ($setting) {
		    return [$setting['key'] => $setting['value']];
		});

		return view('admin.settings.general',['posts'=>$posts,'settings'=>$keyed]);
	}

	public function updateSettings(Request $request){
		foreach ($request->input() as $key => $value) {
			Settings::set($key,$value);
		}
		return '';
	}
}