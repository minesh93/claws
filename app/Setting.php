<?php

namespace Claws;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use ModelValidation;
    protected $fillable = [];
    protected $hidden = [];
    protected static $rules = [];
    protected static $dirtyRules = [];
    protected static $messages = [];

    public function __construct($key = '',$value = '')
    {
        parent::__construct();
        $this->key = $key;
        $this->value = $value;
    }

}
