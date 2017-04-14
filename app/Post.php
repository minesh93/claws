<?php

namespace Claws;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use ModelValidation;
    protected $fillable = [];
    protected $hidden = [];
    protected static $rules = [];
    protected static $dirtyRules = [];
    protected static $messages = [];

    protected $with = ['creator'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function creator(){
        return $this->belongsTo('Claws\User','user_id');
    }

    public function __construct($name = '',$content = '',$type = 'page',$attributes = array())
    {
        parent::__construct($attributes);
        $this->name = $name;
        $this->content = $content;
        $this->type = $type;
    }

}
