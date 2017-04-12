<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use ModelValidation;
    protected $fillable = [];
    protected $hidden = [];
    protected static $rules = [];
    protected static $dirtyRules = [];
    protected static $messages = [];

    public function creator(){
        return $this->hasOne('App\User');
    }

    public function __construct($name = '',$content = '',$type = 'page',$attributes = array())
    {
        parent::__construct($attributes);
        $this->name = $name;
        $this->content = $content;
        $this->type = $type;
    }

}
