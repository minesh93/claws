<?php

namespace Claws\Support;

use Dotenv\Dotenv;
use File;

class Theme{
    public $path = '';
    public $themes = [];

    function __construct()
    {
        $this->path = base_path() . '\themes';
    }

    public function listThemes(){
        foreach (File::directories($this->path) as $directory){
            $themeEnv = new Dotenv($directory,'theme.env');
            $themeEnv->overload();
            if(getenv('THEME_ID') != null){
                $this->themes[getenv('THEME_ID')] = (object) [
                    'id' => getenv('THEME_ID'),
                    'name' => getenv('THEME_NAME')
                ];
            }
        }
        return $this->themes;
    }
}