<?php

namespace Claws\Support;

use Dotenv\Dotenv;
use File;

class Theme{
    public $path = '';
    private $loaderFile = 'loader.php';
    public $themes = [];
    public $activeTheme = [];
    public $styles = [];
    public $scripts = [];
    private static $themeBase = '';

    function __construct()
    {
        $this->path = base_path() . '\themes';
    }

    public function bootTheme(){
        $this->activeTheme = Settings::get('theme');
        self::$themeBase = $this->path . "/" . $this->activeTheme;
        include self::$themeBase . "/" . $this->loaderFile;
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

    public static function getThemePath(){
        return self::$themeBase;
    }

    public function applyTheme($theme){
        Settings::set('theme',$theme);
    }

    public function registerStyle($style){
        $this->styles[] = $style;
    }

    public function registerScripts($script){
        $this->scripts[] = $script;
    }

    public function load($loadCommands){
        $loadCommands();
    }

    public function renderStyles(){
        foreach ($this->styles as $style) {
            echo '<link rel="stylesheet" type="text/css" href="/theme-style/'.$style.'">';
        }
    }

    public function renderScripts(){
        foreach ($this->scripts as $script) {
            echo '<script type="text/javascript" src="/theme-script/'.$script.'"></script>';
        }
    }
}




