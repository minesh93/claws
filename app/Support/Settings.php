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
        if(is_array($key)){
            return Setting::whereIn('key',$key)->get();
        } else {
            return Setting::where('key',$key)->get()->first()->value;
        }
    }

    public static function set($key,$value){
        $setting = Setting::where('key',$key)->get()->first();
        if($setting == null){
            $setting = new Setting($key,$value);
        }else {
            $setting->value = $value;
        }
        $setting->save();
    }
}