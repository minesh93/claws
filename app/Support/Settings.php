<?php

namespace Claws\Support;

use Dotenv\Dotenv;
use Claws\Setting;
use File;

class Settings{
    public $path = '';
    public $themes = [];

    function __construct()
    {
        $this->path = base_path() . '\themes';
    }

    public static function get($key){
        return Setting::where('key',$key)->get()->first()->value;
    }

    public static function set($key,$value){
        $setting = Setting::where('key',$key)->get()->first();
        $setting->value = $value;
        $setting->save();
    }
}