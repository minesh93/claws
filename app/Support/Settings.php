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

    public function get($setting){
        return Setting::where('key',$setting)->get()->first()->value;
    }
}