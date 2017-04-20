<?php

namespace Claws\Http\Controllers\Admin;

use Claws\Facades\PostRegister;
use Claws\Post;
use Claws\Product;
use Settings;
use Illuminate\Http\Request;
use Claws\Http\Controllers\Controller;
use Auth;
use Theme;

class ThemeController extends Controller
{
    public function viewThemes(){
        return view('admin.themes.manage');
    }

    public function applyTheme(Request $request){
        Theme::applyTheme($request->input('theme'));
        return view('admin.themes.manage');
    }
}
